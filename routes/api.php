<?php

use App\Http\Controllers\API\FacebookLeadsController;
use Illuminate\Support\Facades\Route;




Route::middleware(['super_admin', 'auth'])->group(function () {


    Route::prefix('/admin')->group(function () {

        /** All leads routes */
        Route::prefix('/leads')->group(function () {
            Route::get('/', [FacebookLeadsController::class, 'index'])->name('leads.index');
            Route::post('/{user}/add-form-id', [FacebookLeadsController::class, 'addFormId'])->name('leads.add.formId');
            Route::patch('/form/{leadForm}', [FacebookLeadsController::class, 'updateFormId'])->name('leads.update.formId');
            Route::delete('/form/{leadForm}', [FacebookLeadsController::class, 'deleteFormId'])->name('leads.delete.formId');
            Route::post('/insert', [FacebookLeadsController::class, 'insertLeads'])->name('leads.insert');
        });
    });
});
