@extends('layout.master')
@section ('title', 'register')

@section('link')
<!-- <link rel="stylesheet" href=" {{ asset('css/home.css') }} "> -->
@endsection

@section('content')
<div aria-label="breadcrumb" class="main-breadcrumb " style='opacity: 0;'>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              
              <li class="breadcrumb-item active" aria-current="page">Book/login</li>
            </ol>
          </div>
<div >
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 rounded mt-5">
            <div class="card">
                <div class="card-header h1 text-center rounded login100-form-title" style=' background-image: url("img/4.jpg");
  background-repeat: no-repeat;
  background-size: cover; height: 150px;'><span class='text-white'>{{ __('Register') }}</span></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-main">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="mt-4 text-center ">
                        <h6> Already have an account?<a style='color:#53c1b0' href="/login">Login </a></h6>
                    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
