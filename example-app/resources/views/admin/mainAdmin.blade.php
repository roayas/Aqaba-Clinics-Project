@extends('admin.master')
@section ('title', 'Main')

@section('link')
<style>
.color {
    background: #53c1b0;
}
</style>
@endsection

@section('content')

<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>
        @if(!session('clinic_license'))
        <div class="alert alert-danger mb-5 " role="alert">
            <h4>Clinic License</h4>
            <p>Please upload your Clinic License to in order to verify you</p>
            <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Verify Now</a>
        </div>
        @endif
        @if (session('message1'))
        <div class="alert alert-success mb-5 " role="alert">
            {{session('message1')}}
        </div>
        @endif
        <div class="row column1">
            <div class="col-md-6 col-lg-4">
                <div class="full counter_section margin_bottom_30 color">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{$users}}</p>
                            <p class="head_couter">Users</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="full counter_section margin_bottom_30 color">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-user-doctor"></i></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{$doctor}}</p>
                            <p class="head_couter">Doctors</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="full counter_section margin_bottom_30 color">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">{{$book}}</p>
                            <p class="head_couter">Booked Appointment</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row column3">
            <!-- testimonial -->
            <div class="col-md-6">
                <div class=" full margin_bottom_30 dash_blog">
                    <div class="dash_head">
                        <h3><span><i class="fa fa-calendar"></i> Appointments</span></h3>
                    </div>
                    <div class="full graph_revenue">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="content testimonial">
                                    <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for carousel items -->
                                        <div class="carousel-inner">
                                            <div class="item carousel-item active">
                                                <div class="list_cont text-left mb-3">
                                                    <h4>Today Booked Appointments</h4>
                                                </div>
                                                <div class="task_list_main text-left">
                                                    <ul class="task_list">
                                                        @foreach($today as $i)
                                                        <li>
                                                            <h6 href="#">{{$i->user_name}} {{$i->user_lname}}</h6>
                                                            <br><strong>{{$i->time_book}}</strong>
                                                        </li>
                                                        @endforeach
                                                </div>
                                                <div class="read_more">
                                                    <div class="center"><a class="main_bt read_bt h6" style='color:#fff'
                                                            href="/booking">All Booking</a></div>
                                                </div>
                                            </div>
                                            <div class="item carousel-item">
                                                <div class="list_cont text-left mb-3">
                                                    <h4> Tomorrow Booked Appointments</h4>
                                                </div>
                                                <div class="task_list_main text-left">
                                                    <ul class="task_list">
                                                        @foreach($tomorrow as $x)
                                                        <li>
                                                            <h6 href="#">{{$x->user_name}} {{$x->user_lname}}</h6>
                                                            <br><strong>{{$x->time_book}}</strong>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="read_more">
                                                    <div class="center"><a class="main_bt read_bt h6" href="/booking"
                                                            style='color:#fff'>All Booking</a></div>
                                                </div>
                                            </div>
                                            <div class="item carousel-item">
                                                <div class="list_cont text-left mb-3">
                                                    <h4>after Tomorrow Booked Appointments</h4>
                                                </div>
                                                <div class="task_list_main text-left">
                                                    <ul class="task_list">
                                                        @foreach($aftertomorrow as $y)
                                                        <li>
                                                            <h6 href="#">{{$y->user_name}} {{$y->user_lname}}</h6>
                                                            <br><strong>{{$y->time_book}}</strong>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="read_more">
                                                    <div class="center"><a class="main_bt read_bt h6" href="/booking"
                                                            style='color:#fff'>All Booking</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Carousel controls -->
                                        <a class="carousel-control left carousel-control-prev"
                                            href="#testimonial_slider" data-slide="prev">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                        <a class="carousel-control right carousel-control-next"
                                            href="#testimonial_slider" data-slide="next">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end testimonial -->
            <!-- progress bar -->
            <div class="col-md-6">
                <div class="dash_blog">
                    <div class="dash_blog_inner">
                        <div class="dash_head">
                            <h3><span><i class="fa fa-user-doctor"></i> Doctor</span><span class="plus_green_bt"><a
                                        href="/addDoctor">+</a></span></h3>
                        </div>
                        <div class="list_cont">
                            <p>Clinics Doctors</p>
                        </div>
                        <div class="msg_list_main">
                            <ul class="msg_list">
                                @foreach($doctors as $z)
                                <li>
                                    <span><img src="{{ asset('/storage/img/'.$z->doctor_img) }}" class="img-responsive"
                                            alt="#" /></span>
                                    <span>
                                        <span class="name_user">{{$z->doctor_name}}</span>
                                        <span class="msg_user">{{$z->cat_name}}</span>
                                        <span class="time_ago">{{$z->doctor_email}}</span>
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="read_more">
                            <div class="center"><a class="main_bt read_bt" href="/doctorsAdmin">See all</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end progress bar -->
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Clinic License</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/updateLicense" method="post" enctype="multipart/form-data" id="editPic">
                            @csrf
                            <input type="file" class="form-control" id="inputAddress" name='clinic_license'>
                            @error('clinic_license')
                            <div class="alert alert-danger">{{ $message }}
                            </div>
                            @enderror

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection