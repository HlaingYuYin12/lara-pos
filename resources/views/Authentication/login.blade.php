@extends('Authentication.layouts.master')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow w-75">
      <div class="row g-0">
        <div class="col-md-5 left-side p-4">
          <img src="{{asset('admin/img/cat2.jpg')}}" alt="">
        </div>
        <div class="col-md-7 form-section">
          <h3 class="text-center mb-4">Welcome Back!</h3>
          <form method="POST" action="{{ route('login') }}">

            @csrf
            <div class="mb-3">
              <input type="email" class="form-control"name="email" value="{{ old('email')}}" placeholder="Enter Email Address...">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" name="password" value="{{ old('password')}}" placeholder="Password">
            </div>
            {{-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Remember Me</label>
            </div> --}}
            <button type="submit" class="btn btn-primary w-100 mb-2 mt-2">Login</button>
            <hr>
            <a href="{{ url('/auth/google/redirect')}}" type="button" class="btn btn-google w-100 mb-2"><i class="fa-brands fa-google"></i> Login with Google</a>
            <a href="{{ url('/auth/github/redirect')}}" type="button" class="btn btn-dark w-100 "><i class="fa-brands fa-github"></i> Login with Github</a>

          </form>
          <hr>
          <div class="text-center form-footer">
            <a href="#" class="fw-light">Forgot Password?</a>
            <br>
            <a href="{{ route('userRegister')}}" class="fw-light">Create an Account!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
