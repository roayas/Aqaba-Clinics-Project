@extends('layout.master')
@section ('title', 'Home')

@section('link')
<link rel="stylesheet" href=" {{ asset('css/home.css') }} ">
<style>

</style>
@endsection

@section('content')

<div aria-label="breadcrumb" class="main-breadcrumb " style='opacity: 0;'>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>

        <li class="breadcrumb-item active" aria-current="page">Home</li>

        <p class="breadcrumb-item active mt-1" aria-current="page">Home</p>
    </ol>

</div>
<!-- Slider Start -->
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block ">
                    <div class="divider"></div>
                    <span class="text-uppercase text-sm letter-spacing ">Total Health care solution</span>
                    <h1 class="mb-3 mt-3">Your most trusted health partner</h1>

                    <p class="mb-4 pr-5 text-black">Welcome to Aqaba Clinics, where you can book your medical
                        appointment in the best clinics in Aqaba with the click of a button.</p>
                    <div class="btn-container ">
                        <a href="{{ url('/book1') }}" class="btn btn-main-2 btn-icon btn-round-full">Make appoinment <i
                                class="icofont-simple-right ml-2  "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-block d-lg-flex">
                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-surgeon-alt"></i>
                        </div>
                        <span>24 Hours Service</span>
                        <h4 class="mb-3">Online Appointment</h4>
                        <p class="mb-4">Get your appointment at any time you need and in any specialty you want.</p>
                        <a href="{{ url('/book1') }}" class="btn btn-main btn-round-full">Make a appointment</a>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-ui-clock"></i>
                        </div>
                        <span>Timing schedule</span>
                        <h4 class="mb-3">Working Hours</h4>
                        <ul class="w-hours list-unstyled">
                            <li class="d-flex justify-content-between">Sun - Thu: <span>8:00 - 19:00</span></li>
                            <li class="d-flex justify-content-between">Fri : <span>10:00 - 17:00</span></li>
                            <li class="d-flex justify-content-between">Sat - sun : <span>9:00 - 17:00</span></li>
                        </ul>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-handshake-deal"></i>
                        </div>
                        <span>Do you have a clinic?</span>
                        <h4 class="mb-3">Join Us</h4>
                        <p>Add your clinic to our reliable and professional website and introduce technology to your
                            clinic.</p>
                        <a href="{{ url('/logAdmin') }}" class="btn btn-main btn-round-full">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-sm-6">
                <div class="about-img">
                    <img src="{{ asset('/img/about/img-1.jpg') }}" alt="" class="img-fluid">
                    <img src="{{ asset('/img/about/img-2.jpg') }}" alt="" class="img-fluid mt-4">
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="about-img mt-4 mt-lg-0">
                    <img src="{{ asset('/img/about/img-3.jpg') }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-content pl-4 mt-4 mt-lg-0">
                    <h2 class="title-color">Personal care <br>& healthy living</h2>
                    <p class="mt-4 mb-5">We can confidently say that Aqaba Clinics are the first of their kind in the
                        city, where we provide health care that takes care of all family members, in addition to the
                        fact that the team includes a keen administrative staff to provide you with the best health
                        services at affordable prices for all.</p>

                    <a href="{{ url('/about') }}" class="btn btn-main-2 btn-round-full btn-icon">About Us<i
                            class="icofont-simple-right ml-3"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cta-section ">
    <div class="container">
        <div class="cta position-relative">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3">{{$data}}</span>+
                        <p>Happy Users</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-flag"></i>
                        <span class="h3">{{$data3}}</span>+
                        <p>Join Clink</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-badge"></i>
                        <span class="h3">{{$data2}}</span>+
                        <p>Expert Doctors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section service gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h2>Clinics Departments</h2>
                    <div class="divider mx-auto my-4"></div>

                </div>
            </div>
        </div>

        <div class="row">
            @foreach($data5 as $u )
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-4">
                    <div class="icon d-flex align-items-center">
                        <!-- <i class="icofont-laboratory text-lg"></i> -->
                        @if($u->cat_img)
                        <i class="{{$u->cat_img}}"></i>
                        @else
                        <i class="fa-solid fa-stethoscope fa-xl"></i>
                        @endif
                        <h4 class="mt-3 mb-3">{{$u->cat_name}}</h4>
                    </div>

                    <div class="content">
                        <!-- <p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p> -->
                    </div>
                </div>
            </div>

@endforeach

        </div>
    </div>
</section>



<section class="section team">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="mb-4">Meet Our Specialist</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>Today’s users expect effortless experiences. Don’t let essential people and processes stay stuck
                        in the past. Speed it up, skip the hassles</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach($data4 as $i)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-block mb-5 mb-lg-0">
                    @if($i->doctor_img)
                    <img src="{{ asset('storage/img/'.$i->doctor_img) }}" alt="" class="img-fluid w-100">
                    @else
                     <img src="{{asset('img/person-icon.png')}}" alt="" class="img-fluid w-100">
                     @endif

                    <div class="content">
                        <h4 class="mt-4 mb-0"><a href="{{ url('doctor-single.html') }}">{{$i->doctor_name}}</a></h4>
                        <p>{{$i->cat_name}}</p>
                    </div>
                </div>
            </div>

            @endforeach

            <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                <a href="{{ url('/doctors') }}" class="btn btn-main-2 btn-round-full btn-icon">See All<i
                        class="icofont-simple-right ml-3"></i></a>
            </div>
        </div>
    </div>
</section>

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


<section class="section clients">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title text-center">
                    <h2>Approved Insurance Companies</h2>
                    <div class="divider mx-auto my-4"></div>
                    <!-- <p>Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.</p> -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row clients-logo">
        @foreach($data6 as $n)
            <div class="col-lg-2">
                <div class="client-thumb">
                    <img src="{{ asset('/img/about/'.$n->ins_img) }}" alt="" class="img-fluid">
                </div>
            </div>
  @endforeach
          
        </div>
    </div>
</section>

@endsection