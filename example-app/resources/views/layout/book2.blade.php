<?php
use Carbon\Carbon;
?>
@extends('layout.master')
@section ('title', 'book2')

@section('link')
<link rel="stylesheet" href=" {{ asset('css/user.css') }} ">
@endsection

@section('content')
<div aria-label="breadcrumb" class="main-breadcrumb " style='opacity: 0;'>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              
              <li class="breadcrumb-item active" aria-current="page">Book/First Step/Second Step</li>
            </ol>
          </div>

<div aria-label="breadcrumb" class="main-breadcrumb mt-5">
    
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              
              <li class="breadcrumb-item active" aria-current="page">Book/First Step/Second Step</li>
            </ol>
          </div>



</section>
<section class="appoinment section">
    <div class="container">
    @if (session('fail2'))
                            <div class="alert alert-danger mb-5 " role="alert">
                                {{session('fail2')}}
                            </div>
                        @endif
        <div class="row">
            <div class="col-lg-4" id='book2'>
                <div class="mt-3">
                    <div class="feature-icon  ">
                        <span class="bord p-4"> 2</span> <span class="h3">Second Step</span>
                    </div>
                    <div>
                        <div class="line ml-3 mt-3 "></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5" id='book'>
                    <h2 class="mb-2 title-color">Book an appointment</h2>
                    <p class="mb-4">Choose the appointment that suits you from the available appointments of the clinic
</p>

                
                    <p style='display:none'> {{$p= session('data1') }}</p>
                    <p style='display:none'>{{$startTime = Carbon::parse($data->time_start)}}</p>
                    <p style='display:none'>{{$endTime = Carbon::parse($data->time_end)}}</p>
                    <p style='display:none'>{{$timeDifference = $endTime->diffInHours($startTime)}}</p>

                    <p style='display:none'>{{$b = $startTime->format('H:i')}}}} </p>
                    @for ($x = 0; $x < $timeDifference *2; $x++) <p style='display:none'>{{$c= true}}</p>



                        @foreach($data2 as $i)
                        <p style='display:none'>{{$i->time_detail}}</p>
                        <p style='display:none'>{{$timDetail = Carbon::parse($i->time_detail)}} roa</p>
                        <p style='display:none'>{{$a = $timDetail->format('H:i')}} roa</p>


                        @if($a==$b)
                        <p style='display:none'> {{$c= false}}</p>



                        @endif
                        @endforeach
                        <form method='post' action='/book2'>
                        @csrf
                        <!-- @method('put') -->
                        @if($c)
                        @if(Session::has('time'))
                        @if( Session::get('time') == $b)
                        <div class="form-check form-check-inline" style='height: 50px;'>
    <input type="radio" class="form-check-input" id="validationFormCheck2" name="time" required value="{{$b}}" checked>
    <label class="form-check-label" for="validationFormCheck2" style='width: 107px;color: #1c1b38'>{{$b}}</label>
  </div>
  @else
  <div class="form-check form-check-inline" style='height: 50px;'>
    <input type="radio" class="form-check-input" id="validationFormCheck2" name="time" required value="{{$b}}" >
    <label class="form-check-label" for="validationFormCheck2" style='width: 107px;color: #1c1b38'>{{$b}}</label>
  </div>
  @endif 
  @else
  <div class="form-check form-check-inline" style='height: 50px;'>
    <input type="radio" class="form-check-input" id="validationFormCheck2" name="time" required value="{{$b}}" >
    <label class="form-check-label" for="validationFormCheck2" style='width: 107px;color: #1c1b38'>{{$b}}</label>
  </div>
  @endif
                       
                        @endif
                        <p style='display:none'>{{$plus = $startTime->addMinutes(30)}}</p>
                        <p style='display:none'>{{$b = $plus->format('H:i')}} </p>
                        @endfor


                   
                        <!-- <p>{{  Session::get('date')}}</p>
                        <p>{{  Session::get('clinic')}}</p>
                        <p>{{  Session::get('clinicName')}}</p> -->
                        <div class="text-end mt-4">
                        <a class="btn  btn-main text-white btn-round-full mr-3"
                        href="/book1"><i class="icofont-simple-left mr-2"></i>Back
                                </a>
                            <button type='submit' class="btn btn-main text-white btn-round-full">Next
                                <i class="icofont-simple-right ml-2"></i></button>
                        </div>

                    </form>
                    <div style="text-align:center;margin-top:40px;">
                        <span style=' background-color: #53c1b0;' class="step"></span>
                        <span style=' opacity: 1' class="step"></span>
                        <span  class="step"></span>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection