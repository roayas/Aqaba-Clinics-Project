@extends('layout.master')
@section ('title', 'Login')

@section('link')
<!-- <link rel="stylesheet" href=" {{ asset('css/home.css') }} "> -->
<style>


</style>
@endsection

@section('content')
<div aria-label="breadcrumb" class="main-breadcrumb " style='opacity: 0;'>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              
              <li class="breadcrumb-item active" aria-current="page">Book/login</li>
            </ol>
          </div>
<div >
<div class='mt-5'></div>
</div>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 rounded mt-5">
            <div class="card ">
                <div class="card-header h1 text-center rounded login100-form-title" style=' background-image: url("img/4.jpg");
  background-repeat: no-repeat;
  background-size: cover; height: 150px;'><span class='text-white'>{{ __('Login') }}</span></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 mt-5">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 my-3">
                                <button type="submit" class="btn btn-main" style='width: 45%;'>
                                    {{ __('Login') }}
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                            <div class="mt-3 text-center ">
                        <h6> Don't have an account? <a style='color:#53c1b0' href="/register"> Register</a></h6>
                    </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
