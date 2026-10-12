<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NotifyUserAboutAdLink;
use App\Models\User;
use App\Models\UserAd;
use App\Services\StripeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AdminUsersController extends Controller
{
    /**
     * Inject the Stripe service.
     */
    public function __construct(
        private StripeService $stripeService
    ) {}


    /**
     * Show all users.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $validated = $request->validate([
            'ended_date' => ['nullable', 'date_format:Y-m-d'],
        ]);

        $endedDate = $validated['ended_date'] ?? null;

        $users = User::query()
            ->with('subscriptions')
            ->when($endedDate, function ($query) use ($endedDate) {
                $query->whereHas('subscriptions', function ($subscriptionQuery) use ($endedDate) {
                    $subscriptionQuery
                        ->whereDate('ends_at', $endedDate)
                        ->where('ends_at', '<=', now());
                });
            })
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.Users.Index', [
            'users' => $users,
            'endedDate' => $endedDate,
            'getRelevantSubscription' => fn(User $user) =>
            $this->stripeService->getRelevantSubscription($user),
        ]);
    }


    /**
     * Show a specific user.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function show(User $user): View
    {
        $subscription = $this->stripeService->subscriptionInformation($user);

        return view('admin.Users.Show', [
            'user' => $user,
            'subscription' => $subscription,
        ]);
    }


    /**
     * Show all advertisements belonging to a user.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function userAds(User $user): View
    {
        $ads = UserAd::where('user_id', $user->id)
            ->latest()
            ->paginate(15);

        return view('admin.Users.User', [
            'user' => $user,
            'ads' => $ads,
        ]);
    }


    /**
     * Show one specific advertisement belonging to a user.
     *
     * @param User $user
     * @param UserAd $ad
     * @return \Illuminate\View\View
     */
    public function showDetails(User $user, UserAd $ad): View
    {

        abort_if($ad->user_id !== $user->id, 404);

        return view('admin.Users.Details', [
            'user' => $user,
            'details' => $ad,
        ]);
    }

    /**
     * Update the advertisement link.
     *
     * @param Request $request
     * @param User $user
     * @param UserAd $ad
     * @return RedirectResponse
     */
    public function updateAdLink(Request $request, User $user, UserAd $ad): RedirectResponse
    {
        abort_if($ad->user_id !== $user->id, 404);

        $validated = $request->validate([
            'ad_link' => ['nullable', 'url', 'max:2048'],
        ]);

        $ad->update([
            'ad_link' => $validated['ad_link'] ?? null,
        ]);

        if ($ad->ad_link) {
            Mail::to($user->email)->send(new NotifyUserAboutAdLink($user, $ad));
        }

        return back()->with('success', 'Линкът към рекламата беше запазен успешно.');
    }
}
