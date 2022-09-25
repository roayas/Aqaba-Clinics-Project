<?php
use Carbon\Carbon;
?>
@extends('admin.master')
@section ('title', 'Users')

@section('link')

@endsection

@section('content')

<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title row d-flex">
                    <h2 class='col-md-9'>Clinics Users</h2>
                  
                </div>
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
                                        <th>User ID Number</th>
                                        <th>User Phone</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $i)
                                
                                    <tr>
                                        <td>{{$i->user_name}} {{$i->user_lname}}</td>
                                        <td>{{$i->user_id_num}}</td>

                                        <td>{{$i->user_phone}}</td>
                                        <td><a href="{{url('singleuser/id/'.$i->id)}}"  class='btn btnMain'>Details</a></td>
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