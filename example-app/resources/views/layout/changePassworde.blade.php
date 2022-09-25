@extends('layout.master')
@section ('title', 'change password')


@section('link')


@endsection


@section('content')

<div aria-label="breadcrumb" class="main-breadcrumb " style='opacity: 0;'>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>

        <li class="breadcrumb-item active" aria-current="page">change password</li>
    </ol>
</div>

<div aria-label="breadcrumb" class="main-breadcrumb mt-5 ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a>Home</a></li>

        <li class="breadcrumb-item active" aria-current="page">change password</li>
    </ol>
</div>



<section class="appoinment section">
    <div class="container">


        @if (session('message'))
        <div class="alert alert-danger mb-5 " role="alert">
            {{session('message')}}
        </div>
        @endif
        @if (session('message2'))
        <div class="alert alert-success mb-5 " role="alert">
            {{session('message2')}}
        </div>
        @endif
        <div class="row">
            <div class="col-lg-2" id='book1'>
                <div class="mt-3">
                    <div class="feature-icon  ">

                    </div>

                </div>
            </div>

            <div class="col-lg-8">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
                    <h2 class="mb-5 title-color">Change Password</h2>

                    <form method='post' action='userChangePass'>
                        @csrf


                        <div class='row'>
                            <div class='col-md-9'>
                                <div class="form-group">
                                    <label>Current Password </label>
                                    <input type="password" class="form-control @error('old_pass') is-invalid @enderror"
                                        required name='old_pass'>
                                    @error('old_pass')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                        </div>


                        <div class='row'>
                            <div class='col-md-9'>
                                <div class="form-group">
                                    <label>New Password </label>
                                    <input type="password" class="form-control @error('new_pass') is-invalid @enderror"
                                        required name='new_pass'>
                                    @error('new_pass')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                        </div>


                        <div class='row'>
                            <div class='col-md-9'>
                                <div class="form-group">
                                    <label>Confirm Password </label>
                                    <input type="password" class="form-control @error('con_pass') is-invalid @enderror"
                                        required name='con_pass'>
                                    @error('con_pass')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>

                        </div>

                        <div class="text-end mt-4">
                            <button class="btn btn-main text-white btn-round-full">Update Password
                                <i class="icofont-simple-right ml-2"></i></button>
                        </div>

                    </form>

                  
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


@endsection