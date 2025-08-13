<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;

// Social Login
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);


// Auth Pages
Route::redirect('/', 'auth/login');
Route::get('auth/register', [AuthController::class, 'registerPage'])->name('userRegister');
Route::get('auth/login', [AuthController::class, 'loginPage'])->name('userLogin');

require __DIR__ . '/auth.php';

// Include Separate Files
require __DIR__ . '/admin.php';
require __DIR__ . '/user.php';
