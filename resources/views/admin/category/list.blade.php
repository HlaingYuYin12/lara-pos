@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="text-primary">Category List</h5>
                    <a href="{{ route('categoryCreatePage') }}" class="">+ Add Category</a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created Date</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->created_at->format('j-F-Y') }}</td>
                                        <td>
                                            <a href="" class="btn btn-outline-secondary"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-outline-danger"><i
                                                    class="fa-solid fa-trash"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <span class="d-flex justify-content-end">{{ $data->links() }}</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
