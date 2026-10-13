<?php

use App\Http\Controllers\Admin\AdminSupportTicketsController;
use App\Http\Controllers\Admin\AdminUsersController;
use Illuminate\Support\Facades\Route;



Route::middleware(['super_admin', 'auth'])->group(function () {


    Route::prefix('/admin')->group(function () {

        /** All admin user routes */
        Route::prefix('/users')->group(function () {
            Route::get('/', [AdminUsersController::class, 'index'])->name('admin.users.index');
            Route::get('/users/{id}', [AdminUsersController::class, 'show'])->name('admin.user.show');
        });

        /** All support ticket routes */
        Route::prefix('/support-tickets')
            ->group(function () {

                Route::get('/', [AdminSupportTicketsController::class, 'index'])->name('admin.support-tickets.index');
                Route::get('/{supportTicket}', [AdminSupportTicketsController::class, 'show'])->name('admin.support-tickets.show');
            });

        /** All admin user routes */
        Route::prefix('/users')->group(function () {
            Route::get('/', [AdminUsersController::class, 'index'])->name('admin.users.index');
            Route::get('/{user}/ads', [AdminUsersController::class, 'userAds'])->name('admin.users.ads');
            Route::get('/{user}/ads/{ad}', [AdminUsersController::class, 'showDetails'])->name('admin.users.details.show');
            Route::get('/{user}', [AdminUsersController::class, 'show'])->name('admin.users.show');
            Route::patch('/{user}/ads/{ad}/link', [AdminUsersController::class, 'updateAdLink'])->name('admin.users.ads.link.update');
            Route::delete('/{user}/ads/{ad}/materials',[AdminUsersController::class, 'deleteAdMaterial'])
                   ->name('admin.users.ads.material.delete');
        });
    });
    /** End of admin Prefix */
});
