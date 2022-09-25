@extends('layout.master')
@section ('title', 'doctors')

@section('link')
<!-- <link rel="stylesheet" href=" {{ asset('css/home.css') }} "> -->
<style>
  input {

  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}
</style>
@endsection

@section('content')

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">All Doctors</span>
          <h1 class="text-capitalize mb-5 text-lg">Specalized doctors</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">All Doctors</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>


<!-- portfolio -->
<section class="section doctors">
  <div class="container">
  	  <div class="row justify-content-center">
             <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Doctors</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>We provide a wide range of creative services adipisicing elit. Autem maxime rem modi eaque, voluptate. Beatae officiis neque </p>
                </div>
            </div>
        </div>

      <div class=" text-center  mb-5  ">
	        <div class="btn-group btn-group-toggle " data-toggle="buttons">
            <div class="row">
              <div class="col-3 my-2">
	          <label class="btn active ">
	            <input type="radio" name="shuffle-filter" value="all" checked="checked" />All Department
	          </label>
	          </div>
			  @foreach($data2 as $i)
        <div class="col-3 my-2">
			  <label class="btn ">
	            <input type="radio" name="shuffle-filter" value="cat{{$i->cat_id}}" />{{$i->cat_name}}
	          </label>
          </div>
			  @endforeach
      </div>
	        </div>
      </div>

    <div class="row shuffle-wrapper portfolio-gallery">
      	
		  @foreach($data as $y)
      <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat{{$y->cat_id}}&quot;]">
        	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
		        	<div class="doctor-img">
                @if($y->doctor_img)
		               <img src="{{ asset('storage/img/'.$y->doctor_img) }}" alt="doctor-image" class="img-fluid w-100">
                   @else
                   <img  src="{{asset('img/person-icon.png')}}" alt="doctor-image" class="img-fluid w-100">
                   @endif
		            </div>
	            </div>
				
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="{{ url('doctor/id/'.$y->id) }}">{{$y->doctor_name}}</a></h4>
                	<p>{{$y->cat_name}}</p>
					<a href="{{ url('doctor/id/'.$y->id) }}" class="read-more">Learn More  <i class="icofont-simple-right ml-2"></i></a>
                </div> 
	      	</div>
      </div>

     @endforeach
    </div>
  </div>
</section>
<!-- /portfolio -->
<section class="section cta-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="cta-content">
                    <div class="divider mb-4"></div>
                    <h2 class="mb-5 text-lg">are you a doctor?
                        <span class="title-color">own a clinic?</span>
                    </h2>
                    <h3>Join now the largest medical community in Aqaba</h3>
                    <h6>If you want to join the medical community and benefit from the many services that the site
                        provides for doctors and clinics..
                        Don't hesitate and start now to sign up</h6>
                    <a href="{{ url('/logAdmin') }}" class="btn btn-main-2 btn-round-full">Join Now<i
                            class="icofont-simple-right  ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection