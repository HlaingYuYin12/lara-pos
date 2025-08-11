<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //direct user dashboard page
    public function index(){
        return view('user.home');
    }
}
