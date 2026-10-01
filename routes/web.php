<?php

use App\Http\Controllers\API\FacebookLeadsController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\OnlinePaymentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDetailsController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('errors.404');
});

Route::get('/',        [FrontEndController::class, 'welcome'])->name('welcome');
Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');
Route::get('/about',   [FrontEndController::class, 'about'])->name('about');
Route::get('/pricing', [FrontEndController::class, 'pricing'])->name('pricing');
Route::get('/testimonials', [FrontEndController::class, 'testimonials'])->name('testimonials');
Route::get('/videos',[FrontEndController::class, 'videos'])->name('videos');

Route::post('/create/{priceId}/{plan}', [OnlinePaymentsController::class, 'createSubscription'])
    ->name('subscription.create');

Route::post('/', [EmailController::class, 'contactForm'])->name('email.contact-form');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        $user = Auth::user()->load('details');

        $details = $user->load('details');

        return view('Backend.dashboard', [
            'user' => $user,
            'details' => $details,
        ]);
    })->name('dashboard');

    Route::get('/myleads', [FacebookLeadsController::class, 'myLeads'])->name('myleads.index');

    /** All Subscription Routing  */
    Route::prefix('/subscription')->group(function () {
        Route::get('/', [OnlinePaymentsController::class, 'subscriptions'])->name('subscription.index');
        Route::get('/verify', [OnlinePaymentsController::class, 'checkout'])->name('subscription.verify');
        Route::post('/cancel', [OnlinePaymentsController::class, 'cancelSubscription'])->name('subscription.cancel');
        Route::get('/fail', [OnlinePaymentsController::class, 'fail'])->name('subscription.fail');
    });

    Route::prefix('/details')->group(function () {
        Route::get('/', [UserDetailsController::class, 'index'])->name('details.index');
        Route::post('/create/{user}', [UserDetailsController::class, 'createUserDetails'])->name('user.details.create');
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/facebook-page', [ProfileController::class, 'updateFacebookPage'])->name('profile.facebook-page.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/api.php';
