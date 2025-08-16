@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
        <div class="card shadow-sm w-50">
            <div class="card-header text-primary-emphasis">
                <h5 class="mb-0 text-primary">Update Category Page</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('categoryUpdate')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label mb-3">Category Name</label>
                        <input type="hidden" name="categoryID" value="{{ $data->id}}">
                        <input type="text" class="form-control  @error('category') is-invalid @enderror" id="categoryName" name="category" value="{{ old('category',$data->name)}}"
                            placeholder="Enter category name">
                        @error('category')
                            <small class="text-danger"> {{ $message}} </small>
                        @enderror

                    </div>
                    <input type="submit" class="btn btn-primary" value="Create">
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
