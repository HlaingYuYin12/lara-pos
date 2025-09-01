<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/home', [AdminDashboardController::class, 'index'])->name('adminDashboard');

    Route::prefix('category')->group(function () {
        Route::get('list', [CategoryController::class, 'list'])->name('categoryList');
        Route::get('create', [CategoryController::class, 'createPage'])->name('categoryCreatePage');
        Route::post('create', [CategoryController::class, 'create'])->name('categoryCreate');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('categoryDelete');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categoryEdit');
        Route::post('update', [CategoryController::class, 'update'])->name('categoryUpdate');

    });

    Route::prefix('product')->group(function () {
        Route::get('list',[ProductController::class,'list'])->name('productList');
        Route::get('create',[ProductController::class,'create'])->name('productCreatePage');
        Route::post('create',[ProductController::class,'productCreate'])->name('productCreate');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('productDelete');
        Route::get('details/{id}',[ProductController::class,'details'])->name('productDetails');
    });
});
