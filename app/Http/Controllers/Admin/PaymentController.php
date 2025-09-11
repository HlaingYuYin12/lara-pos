<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    //payment page
    public function list(){
        return view('admin.payment.list');
    }


    //create payment page
    public function create()
    {
        $types = Type::all();
        return view('admin.payment.list', compact('types'));
    }


}
