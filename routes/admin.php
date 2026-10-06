<?php

use App\Http\Controllers\Admin\AdminUsersController;
use Illuminate\Support\Facades\Route;



Route::middleware(['super_admin', 'auth'])->group(function () {


    Route::prefix('/admin')->group(function () {

        /** All admin user routes */
        Route::prefix('/users')->group(function () {
            Route::get('/', [AdminUsersController::class, 'index'])->name('admin.users.index');
            Route::get('/users/{id}', [AdminUsersController::class, 'show'])->name('admin.user.show');
        });

        /** All admin user routes */
        Route::prefix('/users')->group(function () {
            Route::get('/', [AdminUsersController::class, 'index'])->name('admin.users.index');
            Route::get('/{user}/ads', [AdminUsersController::class, 'userAds'])->name('admin.users.ads');
            Route::get('/{user}/ads/{ad}', [AdminUsersController::class, 'showDetails'])->name('admin.users.details.show');
            Route::get('/{user}', [AdminUsersController::class, 'show'])->name('admin.users.show');
            Route::patch('/{user}/ads/{ad}/link', [AdminUsersController::class, 'updateAdLink'])->name('admin.users.ads.link.update');
        });

    });
    /** End of admin Prefix */
});
