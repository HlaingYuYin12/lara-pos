@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Product List</h4>
            <a href="{{route('productCreatePage')}}" class="btn btn-primary">+ Add Product</a>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="">
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td> {{$item->name}} </td>
                                <td class="col-3"> <img src=" {{ asset('productImages/'.$item->image)}} " class="img-thumbnail" alt=""> </td>
                                <td> {{$item->price}} MMK</td>
                                <td> {{$item->count}} </td>
                                <td>
                                    <button>Details</button>
                                    <button>Edit</button>
                                    <button>Delete</button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
