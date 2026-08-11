<?php

use App\Http\Controllers\Admin\AdminUsersController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {


    Route::prefix('/admin')->group(function () {

        /** All admin user routes */
        Route::prefix('/users')->group(function () {
            Route::get('/', [AdminUsersController::class, 'index'])->name('admin.users.index');
            Route::get('/users/{id}', [AdminUsersController::class, 'show'])->name('admin.user.show');
        });

        /** All admin user routes */
        Route::prefix('/users')->group(function () {
            Route::get('/', [AdminUsersController::class, 'index'])->name('admin.users.index');
            Route::get('/{user}', [AdminUsersController::class, 'show'])->name('admin.users.show');
            Route::get('/{user}/details', [AdminUsersController::class, 'showDetails'])->name('admin.users.details.show');
        });
    });
    /** End of admin Prefix */
});
