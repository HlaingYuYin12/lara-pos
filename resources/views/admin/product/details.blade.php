@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-header text-primary-emphasis">
                    <h5 class="mb-0 text-primary">Details Page</h5>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <img class="img-thumbnail w-75" id="output" src="{{ asset('productImages/' . $data->image) }}"
                                alt="">

                        </div>
                        <div class="col-lg-8">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label mb-3">Name</label>
                                        <h4>{{ $data->name }}</h4>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="price" class="form-label mb-3">Price</label>
                                        <h4>{{ $data->price }} </h4>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="categoryName" class="form-label mb-3">Category Name</label>
                                        <h4>{{ $data->category_name }} </h4>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="count" class="form-label mb-3">Count</label>
                                        <h4>{{ $data->count }} </h4>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="description" class="form-label mb-3">Description</label>
                                        <h4>{{ $data->description }} </h4>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('productList')}}">
                                <button type="button" class="btn btn-dark">Back</button>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
