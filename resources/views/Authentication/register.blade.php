@extends('Authentication.layouts.master')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow w-75">
            <div class="row g-0">
                <div class="col-md-5 right-side p-4">

                    <img src="{{ asset('admin/img/cat.jpg') }}" alt="">
                </div>

                <div class="col-md-7 form-section">
                    <h3 class="text-center mb-4">Create an Account</h3>
                    <form method="POST" action="{{ route('register') }}">

                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="User Name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>


                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email Address" value="{{ old('email') }}">
                            @error('email')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                placeholder="Enter Phone" value="{{ old('phone') }}">
                            @error('phone')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <input type="address" class="form-control @error('address') is-invalid @enderror" name="address"
                                placeholder="Enter Address" value="{{ old('address') }}">
                            @error('address')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="row mb-3">
                            <div class="col">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Password" value="{{ old('password') }}">
                                @error('password')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="col">
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Repeat Password"
                                    value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>


                        </div>

                        <button type="submit" class="btn btn-primary w-100">Register Account</button>
                        <hr>
                        {{-- <button type="button" class="btn btn-google w-100 mb-2"><i class="fa-brands fa-google"></i> Register with Google</button>
            <button type="button" class="btn btn-dark w-100"><i class="fa-brands fa-github"></i> Register with Github</button> --}}
                    </form>
                    <hr>
                    <div class="text-center form-footer">
                        {{-- <a href="#" class="fw-light">Forgot Password?</a><br> --}}
                        <a href="{{ route('userLogin') }}" class="fw-light">Already have an account? Login!</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
