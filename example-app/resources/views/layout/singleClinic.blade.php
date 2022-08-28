@extends('layout.master')
@section ('title', 'clinic')

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
          <span class="text-white">Department Details</span>
          <h1 class="text-capitalize mb-5 text-lg">{{$data->clinic_name}}</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="{{ url("#") }}" class="text-white-50">Department Details</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>



<section class="section department-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="department-img mb-5">
					<img src="{{ asset($data->clinic_img) }}" alt="" class="img-fluid" style="width: 100%;">
				</div>
				<div class="row shuffle-wrapper portfolio-gallery mt-5">
				
      	<div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat1&quot;,&quot;cat2&quot;]">
	      	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
				<h3 class="my-3">Our Doctors</h3>

					<div class="divider my-4"></div>
					@foreach($data3 as $y)
	               <div class="doctor-img">
	               		<img src="{{ asset('storage/img/'.$y->doctor_img) }}" alt="doctor-image" class="img-fluid w-100">
	               </div>
	            </div>
				<div class="content mt-3">
                	<h4 class="mb-0"><a href="{{ url('doctor/id/'.$y->id) }}">{{$y->doctor_name}}</a></h4>
                	<p>{{$y->cat_name}}</p>
					<a href="{{ url('doctor/id/'.$y->id) }}" class="read-more">Learn More  <i class="icofont-simple-right ml-2"></i></a>
                </div> 
				@endforeach
	      	</div>
      	</div>
</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8">
				<div class="department-content mt-5">
					<h3 class="text-md">{{$data->clinic_cat}}</h3>
					<div class="divider my-4"></div>
					<p class="lead">Age forming covered you entered the examine. Blessing scarcely confined her contempt wondered shy. Dashwoods contented sportsmen at up no convinced cordially affection.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum recusandae dolor autem laudantium, quaerat vel dignissimos. Magnam sint suscipit omnis eaque unde eos aliquam distinctio, quisquam iste, itaque possimus . Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet alias modi eaque, ratione recusandae cupiditate dolorum repellendus iure eius rerum hic minus ipsa at, corporis nesciunt tempore vero voluptas. Tempore.</p>


					<h3 class="mt-5 mb-4">Services features</h3>
					<div class="divider my-4"></div>
					<ul class="list-unstyled department-service">
					@foreach($data1 as $i)
					
					<li><i class="icofont-check mr-2"></i>{{$i->service_name}}</li>
						<!-- <li><i class="icofont-check mr-2"></i>International Drug Database</li>
						<li><i class="icofont-check mr-2"></i>Stretchers and Stretcher Accessories</li>
						<li><i class="icofont-check mr-2"></i>Cushions and Mattresses</li>
						<li><i class="icofont-check mr-2"></i>Cholesterol and lipid tests</li>
						<li><i class="icofont-check mr-2"></i>Critical Care Medicine Specialists</li>
						<li><i class="icofont-check mr-2"></i>Emergency Assistance</li> -->
						@endforeach 
					</ul>
					<form  >
					<a href="{{url('appClinic/id/'.$data->id)}}" class="btn btn-main-2 btn-round-full mt-3">Make an Appoinment<i class="icofont-simple-right ml-2  "></i></a></form>
					
				</div>
			</div>

			<div class="col-lg-4">
				<div class="sidebar-widget schedule-widget mt-5">
					<h5 class="mb-4">Time Schedule</h5>

					<ul class="list-unstyled">
					<li class="d-flex justify-content-between align-items-center">
					    <a href="{{ url('#') }}">Start from </a>
					    <span>{{$data->time_start}}</span>
					  </li>
					  <li class="d-flex justify-content-between align-items-center">
					    <a href="{{ url('#') }}">End to </a>
					    <span>{{$data->time_end}}</span>
					  </li>
					  <!-- <li class="d-flex justify-content-between align-items-center">
					    <a href="{{ url('#') }}">Monday - Friday</a>
					    <span>9:00 - 17:00</span>
					  </li>
					  <li class="d-flex justify-content-between align-items-center">
					    <a href="{{ url('#') }}">Saturday</a>
					    <span>9:00 - 16:00</span>
					  </li>
					  <li class="d-flex justify-content-between align-items-center">
					    <a href="{{ url('#') }}">Sunday</a>
					    <span>Closed</span>
					  </li> -->
					</ul>

					<div class="sidebar-contatct-info mt-4">
						<p class="mb-0">Location</p>
						<h4>{{$data->clinic_location}}</h4>
					
					</div>
					<div class="sidebar-contatct-info mt-4">
						<p class="mb-0">Need Urgent Help?</p>
						<h4>{{$data->clinic_phone}}</h4>
						<h4>{{$data->clinic_email}}</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection