<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StripeService
{
    /**
     * All plans inside the platform.
     *
     * @var array<string, string>
     */
    private static array $paymentPlans = [
        'basic' => 'price_1U1qIE0XJPJxSgBO901YgIMJ',
        'standart' => 'price_1U1rCm0XJPJxSgBO5rUd41mn',
        'premium' => 'price_1U1rN30XJPJxSgBOzr2SkEE6',
    ];

    /**
     * Return the global Stripe client.
     *
     * @return \Stripe\StripeClient
     */
    private function stripe(): \Stripe\StripeClient
    {
        return new \Stripe\StripeClient(env('STRIPE_SECRET'));
    }

    /**
     * Verify the Stripe Checkout session after card input.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function checkout(Request $request): RedirectResponse
    {
        if (! Auth::check()) {
            throw new AuthenticationException('Трябва да влезете в профила си.');
        }

        $checkoutSession = $this->stripe()->checkout->sessions->retrieve($request->input('session_id'));

        if ($checkoutSession->payment_status !== 'paid') {
            return redirect()->route('subscription.fail');
        }

        return redirect()->route('subscription.index');
    }

    /**
     * Create a subscription for the current user.
     *
     * @param Request $request
     * @param string $priceId
     * @param string $plan
     * @return mixed
     */
    public function createSubscription(Request $request, string $priceId, string $plan)
    {
        if (! Auth::check()) {
            return redirect()->back()->with('needToBeLogged', 'Трябва да сте регистрирани в системата');
        }

        $validId = $this->validateId($priceId);
        $validPlan = $this->validatePlan($plan);
        $validPlanPricePair = $this->validatePlanPricePair($plan, $priceId);


        if (! $validId || ! $validPlan) {
            return redirect()->route('subscription.fail');
        }

        if (! $validPlanPricePair) {
            return back()->with('paymentPlansFailed', 'Избраният абонаментен план не отговаря на подадената Stripe цена.');
        }

        if ($this->hasActiveSubscription($request->user())) {
            return back()->with('subscriptionAlreadyExists', 'Вече имате активен абонамент в нашата система!');
        }

        return $request->user()->newSubscription($plan, $priceId)->checkout([
            'success_url' => route('subscription.verify') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('subscription.fail'),
        ]);
    }

    /**
     * Cancel the active subscription at the end of its current period.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function cancelSubscription(Request $request): RedirectResponse
    {
        if (! Auth::check()) {
            throw new AuthenticationException('Трябва да влезете в профила си.');
        }

        $user = $request->user();

        $subscription = DB::table('subscriptions')->where('user_id', $user->id)->where('stripe_status', 'active')->first();

        if (! $subscription) {
            return redirect()->route('subscription.index')->with('error_noSubscription', 'Нямате активен абонамент.');
        }

        try {
            $this->stripe()->subscriptions->update($subscription->stripe_id, [
                'cancel_at_period_end' => true,
            ]);

            return redirect()->route('subscription.index')->with('success', 'Абонаментът ще бъде прекратен в края на текущия период.');
        } catch (\Exception $exception) {
            report($exception);

            return redirect()->route('subscription.index')->with('error', 'Възникна грешка при анулиране на абонамента.');
        }
    }

    /**
     * Return Stripe subscription information for the given user.
     *
     * @param User $user
     * @return array|null
     */
    public function subscriptionInformation(User $user): ?array
    {
        $subscription = DB::table('subscriptions')
            ->where('user_id', $user->id)
            ->where('stripe_status', 'active')
            ->latest()
            ->first();

        if (! $subscription) {
            return [
                'has_subscription' => false,
                'message' => 'Нямате активен абонаментен план в момента',
            ];
        }

        $stripeSubscription = $this->stripe()->subscriptions->retrieve(
            $subscription->stripe_id,
            [
                'expand' => ['items'],
            ]
        );

        $price = $stripeSubscription->items->data[0]->price ?? null;

        $interval = $price?->recurring?->interval;
        $intervalCount = $price?->recurring?->interval_count ?? 1;

        $startedAt = Carbon::createFromTimestamp(
            $stripeSubscription->start_date
        );

        $endsAt = null;

        if ($stripeSubscription->cancel_at_period_end) {
            $endsAt = Carbon::createFromTimestamp($stripeSubscription->cancel_at);
        }

        $isCancelledButActive =
            $stripeSubscription->cancel_at_period_end === true
            && $stripeSubscription->status === 'active';

        $currentPeriodEnd =
            $stripeSubscription->items->data[0]->current_period_end;

        return [
            'has_subscription' => true,
            'name' => $subscription->type,
            'status' => $stripeSubscription->status,
            'active' => $stripeSubscription->status === 'active',
            'started_at' => $startedAt->format('d.m.Y'),
            'interval' => $intervalCount . ' ' . $interval,
            'cancel_at_period_end' => $stripeSubscription->cancel_at_period_end,
            'cancelled_at' => $stripeSubscription->canceled_at
                ? Carbon::createFromTimestamp($stripeSubscription->canceled_at)->format('d.m.Y')
                : null,
            'ends_at' => $endsAt
                ? $endsAt->format('d.m.Y')
                : null,
            'current_period_end' => $currentPeriodEnd
                ? Carbon::createFromTimestamp($currentPeriodEnd)->format('d.m.Y')
                : null,
            'message' => $isCancelledButActive && $endsAt
                ? 'В случай, че спрете абонамента си, все още ще имате достъп до системата до '
                . $endsAt->format('d.m.Y')
                : null,
        ];
    }

    /**
     * Validate a Stripe Price ID coming from the frontend.
     *
     * @param string $priceId
     * @return bool
     */
    private function validateId(string $priceId): bool
    {
        $prices = $this->stripe()->prices->all();

        $allStripePriceIds = [];

        foreach ($prices->data as $price) {
            $allStripePriceIds[] = $price->id;
        }

        if (! in_array($priceId, $allStripePriceIds, true)) {
            return false;
        }

        return true;
    }

    /**
     * Validate a subscription plan coming from the frontend.
     *
     * @param string $plan
     * @return bool
     */
    private function validatePlan(string $plan): bool
    {
        foreach (self::$paymentPlans as $paymentPlan => $priceId) {
            if ($paymentPlan === $plan) {
                return true;
            }
        }

        return false;
    }

    /**
     * Validate that the plan matches the exact Stripe Price ID.
     *
     * @param string $plan
     * @param string $priceId
     * @return bool
     */
    private function validatePlanPricePair(string $plan, string $priceId): bool
    {
        if (! isset(self::$paymentPlans[$plan])) {
            return false;
        }

        return self::$paymentPlans[$plan] === $priceId;
    }

    /**
     * Check whether the user already has an active subscription.
     *
     * @param User $user
     * @return bool
     */
    private function hasActiveSubscription($user): bool
    {
        foreach (self::$paymentPlans as $plan => $priceId) {
            if ($user->subscribed($plan)) {
                return true;
            }
        }

        return false;
    }
}
