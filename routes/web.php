<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderController;


// Route::get('/auth/redirect', function () {
//     return Socialite::driver('github')->redirect();
// });

// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('github')->user();

//     // $user->token
// });
//or

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);

Route::get('/auth/{provider}/callback', [ProviderController::class,'callback']);



// Route::get('/', function () {
//     return view('welcome');
//     // dd('hello');
// });



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () { //login ၀◌င်ပြီးမှအလုပ်လုပ်မယ့်သဘော
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //admin
    Route::group([ 'prefix' => 'admin' , 'middleware' => 'admin' ],function(){
        Route::get('/home',function(){
        return view('admin.home');
    })->name('adminDashboard');

    });



    //user
    Route::group([ 'prefix' => 'user' , 'middleware' => 'user'],function(){
        Route::get('/home',function(){
        return view('user.home');
    })->name('userDashboard');

});

});

require __DIR__.'/auth.php';


//admin
// Route::get('admin/home',function(){
//     return view('admin.home');
// })->name('adminDashboard');


//customer
// Route::get('customer/home',function(){
//     return view('customer.home');
// })->name('userDashboard');



Route::redirect('/', 'auth/login');

Route::get('auth/register',[AuthController::class,'registerPage'])->name('userRegister');
Route::get('auth/login',[AuthController::class,'loginPage'])->name('userLogin');

