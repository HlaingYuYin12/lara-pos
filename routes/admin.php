<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/home', [AdminDashboardController::class, 'index'])->name('adminDashboard');

    Route::prefix('category')->group(function () {
        Route::get('list', [CategoryController::class, 'list'])->name('categoryList');
        Route::get('create', [CategoryController::class, 'createPage'])->name('categoryCreatePage');
        Route::post('create', [CategoryController::class, 'create'])->name('categoryCreate');
    });
});
