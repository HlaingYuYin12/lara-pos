@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="content">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Product List</h4>
                <a href="{{ route('productCreatePage') }}" class="btn btn-primary">+ Add Product</a>
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
                                <th>Functions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td> {{ $item->name }} </td>
                                    <td class="col-1"> <img src=" {{ asset('productImages/' . $item->image) }} "
                                            class="img-thumbnail" alt=""> </td>
                                    <td> {{ $item->price }} MMK</td>
                                    <td> {{ $item->count }} </td>
                                    <td style="width: 20%">
                                        <i class="fa-solid fa-eye btn btn-primary w-25"></i>
                                        <a href="{{ route('productDetails',$item->id)}}">
                                            <i class="fa-solid fa-pen-to-square btn btn-secondary w-25"></i>
                                        </a>
                                        <a href="{{ route('productDelete', $item->id) }}">
                                            <i class="fa-solid fa-trash-can btn btn-danger w-25"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <span class="d-flex justify-content-end"> {{ $products->links() }} </span>
                </div>
            </div>
        </div>
    </div>
@endsection
