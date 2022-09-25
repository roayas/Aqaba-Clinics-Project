@extends('layout.master')
@section ('title', 'Book3')

@section('link')
<link rel="stylesheet" href=" {{ asset('css/user.css') }} ">
@endsection

@section('content')

<!-- <p>{{  Session::get('time')}}</p> -->
<div aria-label="breadcrumb" class="main-breadcrumb " style='opacity: 0;'>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              
              <li class="breadcrumb-item active" aria-current="page">Book/First Step/Second Step/Last Step</li>
            </ol>
          </div>

          <div aria-label="breadcrumb" class="main-breadcrumb mt-5 " >
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              
              <li class="breadcrumb-item active" aria-current="page">Book/First Step/Second Step/Last Step</li>
            </ol>
          </div>

<section class="appoinment section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="mt-3">
                    <div class="feature-icon  ">
                       <span class="bord p-4"> 3</span> <span class="h3">Last Step</span>
                    </div>
                  <div>
                    <div class="line ml-3 mt-3 "></div></div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5" id='book'>
                    <h2 class="mb-2 title-color">Book an appoinment</h2>
                    <p class="mb-4">Complete the personal information details</p>
                    <form id="#" class="appoinment-form" method="post" action="/book3">
                    @csrf
                
                        <div class="row">
                        <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input name="user_name" id="name" type="text" class="form-control" 
                                    value="@if(Session::get('user_name')) {{Session::get('user_name')}} {{Session::get('user_lname')}}
                                    @elseif( Session::get('loginin') ) {{  Auth::user()->name }} {{  Auth::user()->user_lname }} @endif">
                                    @error('user_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input name="email" id="name" type="text" class="form-control" 
                                    value="@if(Session::get('email')) {{Session::get('email')}} @elseif(  Session::get('loginin') ) {{  Auth::user()->email }} @endif">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="ID">ID Number</label>
                                    <input name="user_id_num" id="ID" type="text" class="form-control" value="@if(Session::get('user_id_num')) {{Session::get('user_id_num')}} @elseif(  Session::get('loginin') ) {{  Auth::user()->user_id_num }} @endif">
                                    @error('user_id_num')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input name="user_phone" id="phone" type="text" class="form-control" value="@if(Session::get('user_phone')) {{Session::get('user_phone')}} @elseif(  Session::get('loginin') ) {{  Auth::user()->user_phone }} @endif">
                                    @error('user_phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                          
                
                            

                       

                            
                            
                           
                        </div>
                        <div class="form-group mb-4">
                            <label for="message">Any Note or medical history
                                You want to tell us about</label>
                            <textarea name="note" id="message" class="form-control" rows="6" >@if(Session::get('note')) {{Session::get('note')}}  @endif</textarea>
                        </div>
                        <div class='text-end'>
                        <a class="btn  btn-main text-white btn-round-full mr-3"
                        href="{{url('/book2/id/'.Session::get('clinic').'/date/'.Session::get('date'))}}"><i class="icofont-simple-left mr-2"></i>Back
                                </a>
                            <button class="btn btn-main btn-round-full" href="{{ url('confirmation.html') }}">Make
                                Appoinment</button>
                        </div>
                    </form>
                    <div style="text-align:center;margin-top:40px;">
                        <span style=' background-color: #53c1b0;' class="step"></span>
                        <span style=' background-color: #53c1b0;' class="step"></span>
                        <span style=' opacity: 1' class="step"></span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection