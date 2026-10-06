<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use App\Services\StripeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(StripeService $stripeService): void
    {
        View::composer('*', function ($view) use ($stripeService) {
            $view->with('isAdmin', $this->isAdmin());
            $view->with('profilePicture', $this->profilePicture());
            $view->with(
                'isSubscribed',
                fn(User $user) => $this->isSubscribed($user, $stripeService)
            );
        });
    }

    /**
     * Determine whether the authenticated user is a super admin.
     *
     * @return bool
     */
    private function isAdmin(): bool
    {
        $user = Auth::user();

        if (! $user) {
            return false;
        }

        return $user->roles()
            ->where('role_name', Role::SUPER_ADMIN)
            ->exists();
    }



    /**
     * Check if user has uploaded a Profile Picture
     * Returns the image src as a string
     *
     * @return string
     */
    private static function profilePicture(): string
    {
        $user = Auth::user();

        if (empty($user->profile_pic)) {
            return asset('/assets/img/dashboard/default-avatar.png');
        }

        $path = public_path('/assets/img/dashboard/profile_pics/' . $user->profile_pic);

        return file_exists($path)
            ? asset('/assets/img/dashboard/profile_pics/' . $user->profile_pic)
            : asset('/assets/img/dashboard/default-avatar.png');
    }

    /**
     * Determine whether the user has an active subscription.
     *
     * @param User $user
     * @param StripeService $stripeService
     * @return bool
     */
    private function isSubscribed(User $user, StripeService $stripeService): bool
    {
        return $user->subscriptions()
            ->whereIn('type', $stripeService->getPlanNames())
            ->where('stripe_status', 'active')
            ->exists();
    }
}
