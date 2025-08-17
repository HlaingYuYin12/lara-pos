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
                            <img src="data:image/jpeg;base64,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"
                                alt="">

                                <input type="file" name="" id="" class="mt-3 form-control">
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
                                            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
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
