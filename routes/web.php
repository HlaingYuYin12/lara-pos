<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);

Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //admin
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('/home', [AdminDashboardController::class, 'index'])->name('adminDashboard');

        //category
        Route::prefix('category')->group(function () {
            Route::get('list', [CategoryController::class, 'list'])->name('categoryList');
            Route::get('create', [CategoryController::class, 'createPage'])->name('categoryCreatePage');
            Route::post('create', [CategoryController::class, 'create'])->name('categoryCreate');

        });

    });

    //user
    Route::group(['prefix' => 'user', 'middleware' => 'user'], function () {
        Route::get('/home', [UserDashboardController::class, 'index'])->name('userDashboard');

    });

});

require __DIR__ . '/auth.php';

Route::redirect('/', 'auth/login');

Route::get('auth/register', [AuthController::class, 'registerPage'])->name('userRegister');
Route::get('auth/login', [AuthController::class, 'loginPage'])->name('userLogin');
