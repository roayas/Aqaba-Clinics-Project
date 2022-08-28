
@extends('layout.master')
@section ('title', 'thanks message')

@section('link')
<!-- <link rel="stylesheet" href=" {{ asset('css/home.css') }} "> -->
@endsection

@section('content')
<div aria-label="breadcrumb" class="main-breadcrumb " style='opacity: 0;'>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              
              <li class="breadcrumb-item active" aria-current="page">Book/First Step/Second Step/Last Step</li>
            </ol>
          </div>
          <div aria-label="breadcrumb" class="main-breadcrumb " style='opacity: 0;'>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              
              <li class="breadcrumb-item active" aria-current="page">Book/First Step/Second Step/Last Step</li>
            </ol>
          </div>
       
<section class="section confirmation">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="confirmation-content text-center">
            <i class="icofont-check-circled text-lg text-color-2"></i>
              <h2 class="mt-3 mb-4"> Your appointment was placed</h2>
              <p>Thank you for trusting.</p>
          </div>
      </div>
    </div>
  </div>
</section>

@endsection
