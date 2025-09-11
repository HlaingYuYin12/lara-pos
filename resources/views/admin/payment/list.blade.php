@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-header text-primary-emphasis">
                    <h5 class="mb-0 text-primary">Payment Method</h5>
                </div>

                <form action="{{ route('paymentCreate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="row">
                                    <div class="col-lg border p-3">
                                        <div class="mb-3">
                                            <label for="account_name" class="form-label mb-3">Account Name</label>
                                            <input type="text" class="form-control" id="account_name" name="account_name"
                                                placeholder="Enter account name...">

                                        </div>

                                        <div class="mb-3">
                                            <label for="account_number" class="form-label mb-3">Account Number</label>
                                            <input type="text" class="form-control" id="account_number"
                                                name="account_number" placeholder="Enter account number...">

                                        </div>

                                        <div class="mb-3">
                                            <label for="type" class="form-label mb-3">Payment Type</label>
                                            <select name="type" id="" class="form-control">
                                                <option value="">Choose payment type...</option>

                                                {{-- @foreach ($types as $item)
                                                    <option value="{{ $item->id }}">{{ $item->payment_type }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-8 border p-3">
                                <table class="table table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th>Name</th>
                                            <th>Account Number</th>
                                            <th>Account Type</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> name </td>
                                            <td>acc </td>
                                            <td>MMK</td>
                                            <td class="me-2 text-center">
                                                <a href="" class="btn btn-secondary"><i
                                                        class="fa-solid fa-pen-to-square" ></i></a>

                                                <a href="" class="btn btn-danger"><i
                                                        class="fa-solid fa-trash"></i></a>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
