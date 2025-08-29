@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-header text-primary-emphasis">
                    <h5 class="mb-0 text-primary">Add Product Page</h5>
                </div>

                <form action="{{ route('productCreate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <img class="img-thumbnail w-75" id="output"
                                    src="{{ asset('admin/img/default_image.png') }}" alt="">

                                <input type="file" name="image" onchange="loadFile(event)" id=""
                                    class="mt-3 form-control w-75 @error('image') is-invalid @enderror">
                                @error('image')
                                    <small class="invalid-feedback"> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col-lg-8">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label mb-3">Name</label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder="Enter product name"  value="{{old('name')}}">

                                            @error('name')
                                                <small class="invalid-feedback"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="price" class="form-label mb-3">Price</label>
                                            <input type="text" class="form-control  @error('price') is-invalid @enderror"
                                                id="price" name="price" placeholder="Enter product price"  value="{{old('price')}}">
                                            @error('price')
                                                <small class="invalid-feedback"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="categoryName" class="form-label mb-3">Category Name</label>
                                            <select name="category" id=""
                                                class="form-control @error('category') is-invalid @enderror">

                                                <option value="">Choose category...</option>

                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}" @if(old('category') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <small class="invalid-feedback"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="count" class="form-label mb-3">Count</label>
                                            <input type="text" class="form-control  @error('count') is-invalid @enderror"
                                                id="count" name="count" placeholder="Enter product count"  value="{{old('count')}}">
                                            @error('count')
                                                <small class="invalid-feedback"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="description" class="form-label mb-3">Description</label>
                                            <textarea name="description" id="" cols="30" rows="10"
                                                class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description...">{{old('description')}}</textarea>
                                            @error('description')
                                                <small class="invalid-feedback"> {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
