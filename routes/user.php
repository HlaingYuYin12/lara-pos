<?php

use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'user']], function () {
    Route::get('/home', [UserDashboardController::class, 'index'])->name('userDashboard');
});
