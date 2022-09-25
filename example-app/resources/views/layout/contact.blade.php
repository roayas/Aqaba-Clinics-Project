@extends('layout.master')
@section ('title', 'contact')

@section('link')
<!-- <link rel="stylesheet" href=" {{ asset('css/home.css') }} "> -->
@endsection

@section('content')

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Contact Us</span>
                    <h1 class="text-capitalize mb-5 text-lg">Get in Touch</h1>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact form start -->

<section class="section contact-info pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-live-support"></i>
                    <h5>Call Us</h5>
                    +962-7723-65265
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-support-faq"></i>
                    <h5>Email Us</h5>
                    contact@mail.com
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-location-pin"></i>
                    <h5>Location</h5>
                    king abdallh Street,Aqaba Jordan
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-form-wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="text-md mb-2">Contact us</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p class="mb-5">If you have any questions, please feel free to contact us by filling out the
                        following form, We will get back to you as soon as possible. Thank you!</p>
                </div>
            </div>
        </div>
        <div class="row">
                        <div class="col-12">
                            @if (session('message'))
                            <div class="alert alert-success mb-5 " role="alert">
                                {{session('message')}}
                            </div>
                            @endif
                        </div>
                    </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form  method="post" action="/contact">
                    <!-- form message -->
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Your Full Name</label>
                                <input name="name" id="name" type="text" class="form-control" value="{{old('name')}}">
                                @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Your Email Address</label>
                                <input name="email" id="email" type="email" class="form-control"
                                    value="{{old('email')}}">
                                @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="subject">Subjects</label>
                                <input name="subject" id="subject" type="text" class="form-control"
                                    value="{{old('subject')}}">
                                @error('subject')
                                <div class="alert alert-danger">
                                    {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="subject">Your Phone Number</label>
                                <input name="phone" id="phone" type="text" class="form-control"
                                    value="{{old('phone')}}">
                                @error('phone')
                                <div class="alert alert-danger">
                                    {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group-2 mb-4">
                        <label for="message">Your Message</label>
                        <textarea name="message" id="message" class="form-control"
                            rows="8">{{old('message')}}</textarea>
                        @error('message')
                        <div class="alert alert-danger">
                            {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <input class="btn btn-main btn-round-full" type="submit"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<div class="google-map ">
    <div id="map"></div>
</div>
@endsection