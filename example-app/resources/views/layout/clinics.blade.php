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
	          <label class="btn ">
	            <input type="radio" name="shuffle-filter" value="cat1" />Cardiology
	          </label>
	          <label class="btn">
	            <input type="radio" name="shuffle-filter" value="cat2" />Dental
	          </label>
	          <label class="btn">
	            <input type="radio" name="shuffle-filter" value="cat3" />Neurology
	          </label>
	          <label class="btn">
	            <input type="radio" name="shuffle-filter" value="cat4" />Medicine
	          </label>
	           <label class="btn">
	            <input type="radio" name="shuffle-filter" value="cat5" />Pediatric
	          </label>
	          <label class="btn">
	            <input type="radio" name="shuffle-filter" value="cat6" />Traumatology
	          </label>
			  <label class="btn">
	            <input type="radio" name="shuffle-filter" value="cat7" />Trauma
	          </label>
	        </div>
      </div>

    <div class="row shuffle-wrapper portfolio-gallery">
	@foreach($data as $i)
      	<div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat7&quot;]">
	      	<div class="position-relative doctor-inner-box">
		        <div class="doctor-profile">
	               <div class="doctor-img">
	               		<img src="{{ asset ($i->clinic_img) }}" alt="doctor-image" class="img-fluid w-100">
	               </div>
	            </div>
                <div class="content mt-3">
                	<h4 class="mb-0"><a href="{{ url('doctor-single.html') }}">Clinic Name</a></h4>
                	<p>{{$i->clinic_cat}}</p>
					<p class="mb-4">{{$i->clinic_des}}</p>
						<a href="{{ url('clinic/id/'.$i->id) }}" class="read-more">Learn More  <i class="icofont-simple-right ml-2"></i></a>
                </div> 
	      	</div>
      	</div>

	@endforeach 
</section>

<!-- <section class="section service-2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2>Award winning patient care</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-6 ">
				<div class="department-block mb-5">
					<img src="{{ asset('/img/service/service-1.jpg') }}" alt="" class="img-fluid w-100">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">Opthomology</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
						<a href="{{ url('department-single.html') }}" class="read-more">Learn More  <i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="department-block mb-5">
					<img src="{{ asset('/img/service/service-2.jpg') }}" alt="" class="img-fluid w-100">
					<div class="content">
						<h4 class="mt-4 mb-2  title-color">Cardiology</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
						<a href="{{ url('department-single.html') }}" class="read-more">Learn More <i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-6">
				<div class="department-block mb-5">
					<img src="{{ asset('/img/service/service-3.jpg') }}" alt="" class="img-fluid w-100">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">Dental Care</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
						<a href="{{ url('department-single.html') }}" class="read-more">Learn More <i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>


			<div class="col-lg-4 col-md-6 ">
				<div class="department-block  mb-5 mb-lg-0">
					<img src="{{ asset('/img/service/service-4.jpg') }}" alt="" class="img-fluid w-100">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">Child Care</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
						<a href="{{ url('department-single.html') }}" class="read-more">Learn More <i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="department-block mb-5 mb-lg-0">
					<img src="{{ asset('/img/service/service-6.jpg') }}" alt="" class="img-fluid w-100">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">Pulmology</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
						<a href="{{ url('department-single.html') }}" class="read-more">Learn More <i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-6">
				<div class="department-block mb-5 mb-lg-0">
					<img src="{{ asset('/img/service/service-8.jpg') }}" alt="" class="img-fluid w-100">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">Gynecology</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
						<a href="{{ url('department-single.html') }}" class="read-more">Learn More <i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->

@endsection