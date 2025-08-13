<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    //redirect socialite
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }


    //callback socialite
    public function callback($provider){
        $socialUser = Socialite::driver($provider)->user();

        // dd($user);

        $user = User::updateOrCreate([

            'email' => $socialUser->email ,

        ],[
            'name' => $socialUser->name ,
            'nickname' => $socialUser->nickname ,
            'provider_token' => $socialUser->token ,
            'provider' => $provider ,
            'provider_id' => $socialUser->id  ,
        ]);  //if gmail is something change we must use updateOrCreate() instead of create()
        Auth::login($user);

        // dd(Auth::user()->role);
        if(Auth::user()->role == 'admin'){
            return to_route('adminDashboard');
        }

        if(Auth::user()->role == 'user'){
            return to_route('userDashboard');
        }

        return redirect('/dashboard');


        Auth::logout($user);
    }

}
