<?php
use Carbon\Carbon;
?>
@extends('admin.master')
@section ('title', 'Delete book')

@section('link')

@endsection

@section('content')

<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title row d-flex">
                    <h2 class='col-md-9'>Delete Booking</h2>
                  
                </div>
            </div>
            <div class="col-md-12">
            @if (session('message'))
        <div class="alert alert-danger mb-5 " role="alert">
            {{session('message')}}
        </div>
        @endif

        @if (session('message2'))
        <div class="alert alert-danger mb-5 " role="alert">
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
                                        <th>User Name</th>
                                        <th>Time Booking</th>
                                        <th>Canceled By</th>
                                        <th>Details</th>
                                        <th>Delete Book</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $i)
                                
                                    <tr>
                                        <td>{{$i->user_name}}</td>
                                        <td>{{$i->time_book}}</td>
                                        <td>
                                                @if($i->is_cancel_user==1)
                                                User
                                                @else
                                                Admin
                                                @endif
                                            </td>
                                        <td><a href="{{ url('userDetails/id/'.$i->user_id.'/book/'.$i->id) }}"
                                                class='btn btnMain'> Details</a></td>
                                        <td><a href="{{url('deleteBook/id/'.$i->id)}}"  class='btn btnDen'>Delete</a></td>
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