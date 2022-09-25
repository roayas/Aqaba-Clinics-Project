@extends('layout.master')
@section ('title', 'doctor')

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
          <span class="text-white">Doctor Details</span>
          <h1 class="text-capitalize mb-3 text-lg">{{$data->doctor_name}}</h1>
		  @foreach($data5 as $t)
		  <h3 class="text-capitalize mb-5 text-white">{{$t->clinic_name}}</h3>
		  @endforeach

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="{{ url("#") }}" class="text-white-50">Doctor Details</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section doctor-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="doctor-img-block">
					@if($data->doctor_img)
					<img src="{{ asset('storage/img/'.$data->doctor_img) }}" alt="" class="img-fluid w-100">
					@else
					<img  src="{{asset('img/person-icon.png')}}" alt="" class="img-fluid w-100">
					@endif
					<div class="info-block mt-4">
						<h4 class="mb-0">{{$data->doctor_name}}</h4>
						<p>{{$data->cat_name}}</p>

						<!-- <ul class="list-inline mt-4 doctor-social-links">
							<li class="list-inline-item"><a href="{{ url("#") }}"><i class="icofont-facebook"></i></a></li>
							<li class="list-inline-item"><a href="{{ url("#") }}"><i class="icofont-twitter"></i></a></li>
							<li class="list-inline-item"><a href="{{ url("#") }}"><i class="icofont-skype"></i></a></li>
							<li class="list-inline-item"><a href="{{ url("#") }}"><i class="icofont-linkedin"></i></a></li>
							<li class="list-inline-item"><a href="{{ url("#") }}"><i class="icofont-pinterest"></i></a></li>
						</ul> -->
					</div>
				</div>
			</div>

			<div class="col-lg-8 col-md-6">
				<div class="doctor-details mt-4 mt-lg-0">
					<h2 class="text-md">Introducing to myself</h2>
					<div class="divider my-4"></div>
					@if($data->doctor_des)
					<p>{{$data->doctor_des}} </p>
					@else
					<div style='margin-top:60%'></div>
					@endif
					@foreach ($data5 as $r)
					<form  >
					<a href="{{url('appDoctor/id/'.$r->id)}}" class="btn btn-main-2 btn-round-full mt-3">Make an Appoinment<i class="icofont-simple-right ml-2  "></i></a></form>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section doctor-qualification gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="section-title">
					<h3>My Educational Qualifications</h3>
					<div class="divider my-4"></div>
				</div>
			</div>
		</div>

		<div class='d-flex flex-row flex-md-wrap'>
		@foreach($data2 as $i)
			<div class="col-md-6">
				<div class="edu-block mb-5">
					<span class="h6 text-muted">Year({{$i->edu_from}}-{{$i->edu_to}}) </span>
					<h4 class="mb-3 title-color">{{$i->edu_name}}</h4>
					<p>{{$i->edu_des}}</p>
				</div>
</div>
				@endforeach
				</div>
		</div>
	</div>
</section>


<section class="section doctor-skills">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h3>My skills</h3>
				<div class="divider my-4"></div>
				<ul class="list-unstyled department-service">
					@foreach($data4 as $x)
						<li><i class="icofont-check mr-2"></i>{{$x->skill_name}}</li>
						@endforeach
					</ul>
			</div>
			<div class="col-lg-4">
				<div class="skill-list">
					<h5 class="mb-4">Expertise area</h5>
					<ul class="list-unstyled department-service">
					@foreach($data3 as $y)
						<li><i class="icofont-check mr-2"></i>{{$y->exp_name}}</li>
					@endforeach
					</ul>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar-widget  gray-bg p-4">
					<h5 class="mb-4">Make Appoinment</h5>

					<ul class="list-unstyled lh-35">
						@foreach ($data5 as $r)
					<li class="d-flex justify-content-between align-items-center">
					    <a href="{{ url('#') }}">Start from</a>
						
					    <span>{{$r->time_end}}</span>
					  </li>
					  <li class="d-flex justify-content-between align-items-center">
					    <a href="{{ url('#') }}">End to</a>
					    <span>{{$r->time_end}}</span>
					  </li>
					  @endforeach
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
						<p class="mb-0">Need Urgent Help?</p>
						<h3 class="text-color-2">{{$data->doctor_phone}}</h3>
						<h3 class="text-color-2">{{$data->doctor_email}}</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- {{$data5}} -->
</section>
@endsection