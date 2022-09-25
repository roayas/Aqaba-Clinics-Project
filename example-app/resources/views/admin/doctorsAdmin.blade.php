<?php
use Carbon\Carbon;
?>
@extends('admin.master')
@section ('title', 'Doctors')

@section('link')

@endsection

@section('content')

<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title row d-flex">
                    <h2 class='col-md-9'>Doctors</h2>
                    <div class='justify-content-end col-md-3'>
                        <a href='addDoctor' class='btn btnMain  ' style='font-size: 18px;'><i class="fa fa-plus"> </i> Add
                            Doctor</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
            @if (session('message'))
        <div class="alert alert-danger mb-5 " role="alert">
            {{session('message')}}
        </div>
        @endif

        @if (session('message2'))
        <div class="alert alert-success mb-5 " role="alert">
            {{session('message2')}}
        </div> @endif
            </div>
        </div>
      
        <!-- row -->
        <div class="row">
       
       
            <!-- table section -->
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2> </h2>
                        </div>
                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <th>Doctor Specialist</th>
                                        <th>Details</th>
                                        <th>Remove Doctor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $i)
                                
                                    <tr>
                                        <td>{{$i->doctor_name}}</td>
                                        <td>{{$i->cat_name}}</td>

                                        <td><a href="{{url('doctorDetails/id/'.$i->id)}}"
                                                class='btn btnMain'> Details</a></td>
                                        <td><a href="{{url('cancelDoctor/id/'.$i->id)}}"  class='btn btnDen'>Remove</a></td>
                                    </tr>
                                 
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