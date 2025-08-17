<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ProductController;

class ProductController extends Controller
{
    //product list page
    public function list(){
        return view('admin.product.list');
    }

    //product create page
    public function create(){
        return view('admin.product.create');
        
    }
}
