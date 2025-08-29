@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-header text-primary-emphasis">
                    <h5 class="mb-0 text-primary">Add Product Page</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <img class="img-thumbnail w-75" id="output" src="{{asset('admin/img/default_image.png')}}"
                                alt="">

                                <input type="file" name="" onchange="loadFile(event)" id="" class="mt-3 form-control w-75">
                        </div>
                        <div class="col-lg-8">
                            <form action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label mb-3">Name</label>
                                            <input type="text" class="form-control " id="name" name="name"
                                                placeholder="Enter product name">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="price" class="form-label mb-3">Price</label>
                                            <input type="text" class="form-control " id="price" name="price"
                                                placeholder="Enter product price">
                                        </div>
                                    </div>
                                </div>


                                 <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="categoryName" class="form-label mb-3">Category Name</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Choose category...</option>

                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id}}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="count" class="form-label mb-3">Count</label>
                                            <input type="text" class="form-control " id="count" name="count"
                                                placeholder="Enter product count">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="description" class="form-label mb-3">Description</label>
                                            <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Enter Description..."></textarea>
                                        </div>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
