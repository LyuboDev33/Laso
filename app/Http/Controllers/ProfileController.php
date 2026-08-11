<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Stripe\StripeClient;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('Backend.profile', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validateWithBag('profile', [
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'profile_pic' => [
                'nullable',
                'image',
                'mimes:jpeg,jpg,png',
                'max:2048',
            ],
        ], [
            'name.required' => 'Името е задължително.',
            'name.string' => 'Името трябва да бъде текст.',
            'name.max' => 'Името не може да бъде по-дълго от 255 символа.',

            'email.required' => 'Имейлът е задължителен.',
            'email.email' => 'Моля, въведете валиден имейл адрес.',
            'email.max' => 'Имейлът не може да бъде по-дълъг от 255 символа.',
            'email.unique' => 'Потребител с този имейл адрес вече съществува.',

            'profile_pic.image' => 'Файлът трябва да бъде изображение.',
            'profile_pic.mimes' => 'Изображението трябва да бъде във формат JPG, JPEG или PNG.',
            'profile_pic.max' => 'Изображението не може да надвишава 2 MB.',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($request->hasFile('profile_pic')) {
            $profilePicture = $request->file('profile_pic');

            $filename = time() . '_' . $profilePicture->getClientOriginalName();

            $profilePicture->move(public_path('assets/img/dashboard/profile_pics'), $filename);

            $user->profile_pic = $filename;
        }

        $user->save();

        return redirect()
            ->route('profile.edit')
            ->with('editSuccess', 'Промените бяха запазени успешно!');
    }

    /**
     * Update the authenticated user's Facebook page.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateFacebookPage(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'facebook_page_url' => ['required', 'url',]
        ]);

        $user = Auth::user();

        $user->update([
            'facebook_page' => $validated['facebook_page_url'],
        ]);

        return back()->with(
            'successFacebookUpdate',
            'Линкът към Facebook страницата беше запазен успешно.'
        );
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        $this->deleteSubscription($user);

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Cancel the user's active Stripe subscription immediately.
     *
     *  @param User $user
     *  @return void
     */
    private function deleteSubscription($user): void
    {
        $subscription = $user->subscriptions()
            ->where('stripe_status', 'active')
            ->first();

        if (! $subscription) {
            return;
        }

        try {
            $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

            $stripe->subscriptions->cancel($subscription->stripe_id);

            DB::table('subscriptions')
                ->where('user_id', $user->id)
                ->delete();
        } catch (\Throwable $exception) {
            Log::error('Stripe subscription cancellation failed.', [
                'user_id' => $user->id,
                'subscription_id' => $subscription->stripe_id,
                'message' => $exception->getMessage(),
            ]);
        }
    }

    /**
     * Display the XML audit file.
     */
    public function downloadStaticXML()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $successfulPayments = [];

        $transactions = $stripe->checkout->sessions->all([
            'limit' => 100,
            'expand' => [
                'data.line_items',
                'data.customer',
            ],
        ]);

        foreach ($transactions->autoPagingIterator() as $transaction) {
            if ($transaction->payment_status !== 'paid') {
                continue;
            }

            $dateTime = Carbon::createFromTimestamp(
                $transaction->created,
                'Europe/Sofia'
            );

            $transaction->human_date = $dateTime->toDateString();
            $transaction->human_time = $dateTime->toTimeString();
            $transaction->list_items = $transaction->line_items->data ?? [];

            $successfulPayments[] = $transaction;
        }

        $creationDate = now()->toDateString();
        $month = now()->subMonth()->format('m');
        $year = now()->format('Y');
        $vatPercent = 9;

        return response()
            ->view('documents', [
                'orders' => $successfulPayments,
                'creationDate' => $creationDate,
                'month' => $month,
                'year' => $year,
                'vatPercent' => $vatPercent,
            ])
            ->header(
                'Content-Type',
                'application/xml; charset=Windows-1251'
            );

        /*
        To force a download, add:

        ->header(
            'Content-Disposition',
            'attachment; filename="Softex-audit.xml"'
        );
        */
    }
}
