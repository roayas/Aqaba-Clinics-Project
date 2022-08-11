<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/7b836f378e.js" crossorigin="anonymous"></script>
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('/images/favicon.ico')}}" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{asset('plugins/icofont/icofont.min.css')}}">
  <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick/slick-theme.css')}}">

  <!-- Main Stylesheet -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
@yield('link')
    <title>@yield('title')</title>
    <style>
     
      

    </style>
</head>
<body>

<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>support@aqabaclinics.com</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Ta-134/A, Aqaba, Jordan </li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+23-345-67890" >
							<span>Call Now : </span>
							<span class="h4">962-7777-77777</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container-fluid">
		 	 <a class="ontainer-fluid" href="">
			  	<img src="{{asset('img/logo.png')}}" alt="" class="img-fluid"  width="300px">
			  </a>

		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse justify-content-center" id="navbarmain">
			<ul class="navbar-nav ">
			  <li class="nav-item active">
				<a class="nav-link" href="index.html">Home</a>
			  </li>
			  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="department.html" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clinics <i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown02">
						<li><a class="dropdown-item" href="department.html">Clinics</a></li>
						<li><a class="dropdown-item" href="department-single.html">Doctors</a></li>
                        <li><a class="dropdown-item" href="department-single.html">Appointment</a></li>
					</ul>
			  	</li>
				  <li class="nav-item active">
				<a class="nav-link" href="index.html">Service</a>
			  </li>
			   <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
              <li class="nav-item"><a class="nav-link" href="service.html">Join Us</a></li>
			   <!-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="blog-sidebar.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog <i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown05">
						<li><a class="dropdown-item" href="blog-sidebar.html">Blog with Sidebar</a></li>

						<li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
					</ul>
			  	</li> -->
			   <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
			</ul>

		  </div>
          <div class="navbar-nav justify-content-end" id="navbarmain">
                <a href="#" class="nav-item nav-link" >Login</a>
            </div>
        
		</div>
	</nav>
</header>

