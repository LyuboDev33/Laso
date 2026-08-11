<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminUsersController extends Controller
{

    /**
     * Inject the Stripe service.
     */
    public function __construct(private StripeService $stripeService) {}

    /** Show all the users */
    public function index()
    {
        return view('admin.Users.Index', [
            'users' => User::orderBy('id', 'desc')->paginate(15)
        ]);
    }

    /**
     * Show a specific user.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $user = User::find($id);

        if (! $user) {
            return view('404');
        }

        $subscription = $this->stripeService->subscriptionInformation($user);

        return view('admin.Users.Show', [
            'user' => $user,
            'subscription' => $subscription,
        ]);
    }
}
