<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
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
    <script src="https://kit.fontawesome.com/7b836f378e.js" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
    @yield('link')
    <title>@yield('title')</title>
    <style>


    </style>
</head>

<body>

    <header>



        <nav class="navbar navbar-expand-md  shadow-sm navigation sticky" id="navbar">
            <div class="container">
                <a class="ontainer-fluid" href="/home">
                    <img src="{{asset('img/alogo.png')}}" alt="" class="img-fluid" width="200px" he>
                </a>
                <button class="navbar-toggler border" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav m-auto">

                        <li class="nav-item ">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/book1">Appointment</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/clinics" id="dropdown02"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clinics <i
                                    class="icofont-thin-down"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown02">
                                <li><a class="dropdown-item" href="/clinics">Clinics</a></li>
                                <li><a class="dropdown-item" href="/doctors">Doctors</a></li>
                                <!-- <li><a class="dropdown-item" href="/book1">Appointment</a></li> -->
                            </ul>
                        </li>
                      
                        <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="/logAdmin">Join </a></li>
                       
                        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-to-bracket fa-xl color mt-3 mr-2"> </i>  {{ __('Login') }}</a>
                        </li>
                        @endif
                        
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <!-- <a class="nav-link " href="{{ route('register') }}"><i class="fa-solid fa-user-plus mr-1  color"></i>{{ __('Register') }}</a> -->
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}<i class="fa-solid fa-caret-down ml-2"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item " href="/user"   >
                                    {{ __('Account') }}
                                </a>
                                <a class="dropdown-item " href="/changePasswordUser"   >
                                    {{ __('Change Password') }}
                                </a>
                                <a class="dropdown-item " href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                    {{ __('Logout') }}
                                </a>

                               
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    
    </header>

    <!-- <script>
        // When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
    </script> -->