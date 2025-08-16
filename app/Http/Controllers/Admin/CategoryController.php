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

    //delete category
    public function delete($id){
        Category::where('id',$id)->delete();

        Alert::success('Success', 'Category name is deleted successfully');

        return back();
    }

    //edit category
    public function edit($id){
        $data = Category::where('id',$id)->first();

        // dd($data->toArray());

        return view('admin.category.edit',compact('data'));
    }


    //update category
    public function update(Request $request){
        // dd($request->all());
        $validator = $request->validate([
            'category' => 'required|unique:categories,name,'.$request->id
        ]);

        Category::where('id',$request->categoryID)->update([
            'name' => $request->category
        ]);

        Alert::success('Update Success', 'Category name is updated successfully');

        return to_route('categoryList');
    }
}
