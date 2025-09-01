<?php
namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\ProductController;

class ProductController extends Controller
{
    //product list page
    public function list()
    {
        $products = Product::paginate(3);
        return view('admin.product.list',compact('products'));
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

        //data request
        $data = $this->requestProductData($request);
        if($request->hasFile('image')){
            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/productImages/',$fileName);
            $data['image'] = $fileName;
        }

        Product::create($data);

        Alert::success('Create Success', 'Product list is created successfully');

        return to_route('productList');

    }


    //delete products
    public function delete($id){
        Product::where('id',$id)->delete();
        Alert::success('Delete Success', 'Product list is deleted successfully');
        return back();
    }


    //create update validation check
    private function validationCheck($request, $action)
    {

        $rules = [
            'name'        => 'required|unique:products,name',
            'price'       => 'required',
            'description' => 'required',
            'image'       => 'required|mimes:png,jpg,jpeg',
            'count'       => 'required|numeric|max:999',
            'category'    => 'required',
        ];

        $message = [
            'name.required' => 'နာမည်ဖြည့်ရန်လိုအပ်ပါသည်။',
        ];

        $validator = $request->validate($rules, $message);

    }

    private function requestProductData($request){
        return [
            'name' =>  $request->name,
            'price' =>  $request->price,
            'description' =>  $request->description,
            'category_id' =>  $request->category,
            'count' =>  $request->count,
        ];
    }
}
