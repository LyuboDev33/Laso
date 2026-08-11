<?php

namespace App\Http\Controllers;

use App\Services\StripeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OnlinePaymentsController extends Controller
{
    /**
     * Inject the Stripe service.
     */
    public function __construct(private StripeService $stripeService)
    {
    }

    /**
     * Verify a successful Stripe Checkout payment.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function checkout(Request $request)
    {
        return $this->stripeService->checkout($request);
    }

    /**
     * Create a new Stripe subscription.
     *
     * @param Request $request
     * @param string $priceId
     * @param string $plan
     * @return Response
     */
    public function createSubscription(Request $request, string $priceId, string $plan)
    {
        return $this->stripeService->createSubscription($request, $priceId, $plan);
    }

    /**
     * Cancel the currently active subscription.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function cancelSubscription(Request $request)
    {
        return $this->stripeService->cancelSubscription($request);
    }

    /**
     * Show the current user's subscription information.
     *
     * @return \Illuminate\View\View
     */
    public function subscriptions()
    {
        $subscription = $this->stripeService->subscriptionInformation(Auth::user());

        return view('Backend.subscriptions', [
            'subscription' => $subscription,
        ]);
    }

    /**
     * Show the payment failed page.
     *
     * @return  \Illuminate\View\View
     */
    public function fail()
    {
        return view('errors.SubscriptionFailed');
    }
}
