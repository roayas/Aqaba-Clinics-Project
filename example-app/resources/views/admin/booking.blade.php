<?php
use Carbon\Carbon;
?>
@extends('admin.master')
@section ('title', 'booking')

@section('link')

@endsection

@section('content')

<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title row d-flex">
                    <h2 class='col-md-9'>Booking</h2>
                    <div class='justify-content-end col-md-3'>
                        <a href='addbook' class='btn btnMain  ' style='font-size: 18px;'><i class="fa fa-plus"> </i> Add
                            an appointments</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                @if (session('message2'))
                <div class="alert alert-danger mb-5 " role="alert">
                    {{session('message2')}}
                </div>
                @endif

                @if (session('message'))
                <div class="alert alert-success mb-5 " role="alert">
                    {{session('message')}}
                </div>
                @endif
            </div>
        </div>

        <!-- row -->
        <div class="row">


            <!-- table section -->
            <div class="col-md-6">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Upcoming Appointments</h2>
                        </div>
                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>User Name</th>
                                        <th>Appointment Time</th>
                                        <th>Details</th>
                                        <th>Cancel Appointment</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $i)
                                    @if($i->admin_add)
                                    <tr>
                                        <td>{{$i->id}}</td>
                                        <td>{{$i->admin_add}}</td>
                                        <td>{{$i->time_book}}</td>
                                        <td class='text-center'><button style=' border:none;'><i class="fa fa-ban fa-lg"
                                                    style='color:red;'></button></i></td>
                                        <td><a href="{{url('cancel/id/'.$i->id)}}" class='btn btnDen'>Cancel</a></td>

                                    </tr>
                                    @else
                                    <tr>
                                        <td>{{$i->id}}</td>
                                        <td>{{$i->user_name}}</td>
                                        <td>{{$i->time_book}}</td>

                                        <td><a href="{{ url('userDetails/id/'.$i->user_id.'/book/'.$i->id) }}"
                                                class='btn btnMain'> Details</a></td>
                                        <td><a href="{{url('cancel/id/'.$i->id)}}" class='btn btnDen'>Cancel</a></td>

                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table section -->
            <div class="col-md-6">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Previous Appointments</h2>
                        </div>
                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                            <table class="table table-striped">

                                <thead>

                                    <tr>
                                        <th>User Name</th>
                                        <th>Appointment Time</th>
                                        <th>Details</th>
                                        <th>Cancel Appointment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data2 as $i)
                                    @if($i->admin_add)
                                    <tr>
                                        <td>{{$i->admin_add}}</td>
                                        <td>{{$i->time_book}}</td>
                                        <td class='text-center'><button style=' border:none;'><i class="fa fa-ban fa-lg"
                                                    style='color:red;'></button></i></td>
                                        <td><a href="{{url('cancel/id/'.$i->id)}}" class='btn btnDen'>Cancel</a></td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>{{$i->user_name}}</td>
                                        <td>{{$i->time_book}}</td>
                                        <td><a href="{{ url('userDetails/id/'.$i->user_id.'/book/'.$i->id) }}"
                                                class='btn btnMain'> Details</a></td>
                                        <td><a href="{{url('cancel/id/'.$i->id)}}" class='btn btnDen'>Cancel</a></td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection