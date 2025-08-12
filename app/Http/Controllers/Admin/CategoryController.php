<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    //
    public function list(){
        $data = Category::orderBy('created_at','desc')->paginate(5);
        return view('admin.category.list',compact('data'));
    }

    public function createPage(){
        return view('admin.category.create');
    }

    public function create(Request $request){
        // dd($request->all());
        $validator = $request->validate([
            'category' => 'required|unique:categories,name',
        ],[
            'category.required' => 'Category field ကို ဖြည့်စွက်ရန် လိုအပ်ပါသည်။',
            'category.unique' => 'အမျိုးအစားကို ယူထားပြီးဖြစ်သည်။',
        ]);

        Category::create([
            'name' => $request->category,
        ]);

        // return back()->with(['success'=>'insert success']);
        Alert::success('Success', 'Category name is created successfully');

        return back();
        // return to_route('categoryList');

    }
}
