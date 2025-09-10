<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //payment page
    public function list(){
        return view('admin.payment.list');
    }
}
