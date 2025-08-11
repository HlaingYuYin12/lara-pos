@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
        <div class="card shadow-sm w-50">
            <div class="card-header text-primary-emphasis">
                <h5 class="mb-0 text-primary">Add Category Page</h5>
            </div>
            <div class="card-body">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label mb-3">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="category_name"
                            placeholder="Enter category name">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
