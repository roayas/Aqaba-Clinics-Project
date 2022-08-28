@extends('layout.master')
@section ('title', 'Clinics')

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
			<div class='mt-5' style='opacity: 0;'>welcome</div>
          <h1 class="text-capitalize mb-5 text-lg">Care Clinics</h1>

          <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">All Clinics</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section doctors">
  <div class="container">
  	  <div class="row justify-content-center">
             <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Clinics</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>We provide a wide range of creative services adipisicing elit. Autem maxime rem modi eaque, voluptate. Beatae officiis neque </p>
                </div>
            </div>
        </div>

      <div class="col-12 text-center  mb-5">
	        <div class="btn-group btn-group-toggle " data-toggle="buttons">
			
	          <label class="btn active ">
	            <input type="radio" name="shuffle-filter" value="all" checked="checked" />All Department
	          </label>
			  @foreach($data2 as $x)
	          <label class="btn ">
	            <input type="radio" name="shuffle-filter" value="cat{{$x->cat_id}}" />{{$x->cat_name}}
	          </label>
	          @endforeach
	        </div>
      </div>

    <div class="row shuffle-wrapper portfolio-gallery">
	@foreach($data as $i)
      	<div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat{{$i->cat_id}}&quot;]">
	      	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
	               <div class="doctor-img">
	               		<img src="{{ asset ($i->clinic_img) }}" alt="doctor-image" class="img-fluid w-100">
	               </div>
	            </div>
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="{{ url('clinic/id/'.$i->id) }}">Clinic Name</a></h4>
                	<p>{{$i->clinic_cat}}</p>
					<p class="mb-4">{{$i->clinic_short_des}}</p>
						<a href="{{ url('clinic/id/'.$i->id) }}" class="read-more">Learn More  <i class="icofont-simple-right ml-2"></i></a>
                </div> 
	      	</div>
      	</div>

	@endforeach 
</section>

<!-- /portfolio -->
<section class="section cta-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="cta-content">
					<div class="divider mb-4"></div>
					<h2 class="mb-5 text-lg">We are pleased to offer you the <span class="title-color">chance to have the healthy</span></h2>
					<a href="{{ url('appoinment.html') }}" class="btn btn-main-2 btn-round-full">Get appoinment<i class="icofont-simple-right  ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection