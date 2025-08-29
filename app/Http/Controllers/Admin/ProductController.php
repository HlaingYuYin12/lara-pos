<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //product list page
    public function list()
    {
        return view('admin.product.list');
    }

    //product create page
    public function create()
    {
        $categories = Category::get();
        return view('admin.product.create', compact('categories'));

    }

    //product create
    public function productCreate(Request $request)
    {
        // dd($request->all());
        $this->validationCheck($request, "create");

    }

    //create update validation check
    private function validationCheck($request, $action)
    {

        $rules = [
            'name'        => 'required|unique:products,name',
            'price'       => 'required',
            'description' => 'required',
            'image'       => 'required|mimes:png,jpg,jpeg',
            'count'       => 'required|max:100',
            'category'    => 'required',
        ];

        $message = [
            'name.required' => 'နာမည်ဖြည့်ရန်လိုအပ်ပါသည်။',
        ];

        $validator = $request->validate($rules, $message);

    }
}
