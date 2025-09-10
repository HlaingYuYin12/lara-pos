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
        // dd(request('searchKey'));
        $products = Product::when(request('searchKey'),function($query){
                        $query->whereAny(['name','price','count'],'like','%'.request('searchKey').'%');
                    })
                    ->paginate(3);
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



    //details products
    public function details($id){
        // $data = Product::where('id',$id)->first();
        // dd($data->toArray());

        $data = Product::select('products.id','products.name','products.price','products.description','products.category_id','products.count','products.image', 'categories.name as category_name')
                        ->leftJoin('categories','products.category_id','=','categories.id') //ဘယ်tableကိုjoin, ဘယ်လိုjoinမှာလဲ ,
                        ->where('products.id',$id)->first();
        // dd($data->toArray());


        return view('admin.product.details',compact('data'));
    }

    //edit products
    public function edit($id){

        $products = Product::select('products.id','products.name','products.price','products.description','products.category_id','products.count','products.image', 'categories.name as category_name')
                        ->leftJoin('categories','products.category_id','=','categories.id') //ဘယ်tableကိုjoin, ဘယ်လိုjoinမှာလဲ ,
                        ->where('products.id',$id)->first();

        $categories = Category::get();

        return view('admin.product.edit',compact('products','categories'));
    }


    //update products
    public function update(Request $request){
        // dd($request->all());

        $this->validationCheck($request, "update");

        $data = $this->requestProductData($request);

        if($request->hasFile('image')){
            //delete old image
            $oldImageName = $request->oldImage;
            // dd($oldImageName);

            if(file_exists(public_path('productImages/'.$oldImageName))){
                unlink(public_path('productImages/'.$oldImageName));
            }


            //upload new image
            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/productImages/',$fileName);
            $data['image'] = $fileName;


        }else{
            $data['image'] = $request->oldImage;
        }

        Product::where('id',$request->productId)->update($data);
        Alert::success('Update Success', 'Product list is updated successfully');
        return to_route('productList');
    }


    //create update validation check
    private function validationCheck($request, $action)
    {

        $rules = [
            'name'        => 'required|unique:products,name,'.$request->productId,
            'price'       => 'required',
            'description' => 'required',
            // 'image'       => 'required|mimes:png,jpg,jpeg',
            'count'       => 'required|numeric|max:999',
            'category'    => 'required',
        ];

        $message = [
            'name.required' => 'နာမည်ဖြည့်ရန်လိုအပ်ပါသည်။',
        ];

        $rules['image'] = $action == "create" ? "required|mimes:png,jpg,jpeg" : "mimes:png,jpg,jpeg";

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
