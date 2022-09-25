<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="{{ asset('/images/fevicon.png') }}" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('/css/admin/css/bootstrap.min.css') }}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('/css/admin/css/responsive.css') }}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('/css/admin/css/color_2.css') }}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('/css/admin/css/bootstrap-select.css') }}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('/css/admin/css/perfect-scrollbar.css') }}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('css/admin/css/custom.css') }}" />
    <script src="https://kit.fontawesome.com/7b836f378e.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    @yield('link')
    <title>@yield('title')</title>
</head>

<body class="dashboard dashboard_2">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <div class="logo_section">
                            <a href="{{ url('/main') }}"><img class="logo_icon img-responsive"
                                    src="{{ asset('img/alogo.png') }}" alt="#" /></a>
                        </div>
                    </div>
                    <div class="sidebar_user_info">
                        <div class="icon_setting"></div>
                        <div class="user_profle_side">
                            @if(Session::get('clinic_img'))
                            <div class="user_img"><a href="/profile"><img class="img-responsive"
                                        src="{{ asset('/storage/img/'.Session::get('clinic_img')) }}" alt="#" /></a>
                            </div>
                            @else
                            <div class="user_img"><a href="/profile"><img class="img-responsive"
                                        src="{{ asset('img/person-icon.png')}}" alt="#" /></a></div>
                            @endif
                            <div class="user_info">
                                <h6>{{Session::get('clinic_name')}}</h6>
                                <p><span class="online_animation"></span> Online</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar_blog_2">
                    <h4>General</h4>
                    <ul class="list-unstyled components">
                    <!-- <li class="active">
                        <a href="#Main" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-home"></i> <span>Main</span></a>
                        <ul class="collapse list-unstyled" id="Main">
                           <li>
                              <a href="{{ url('/main')}} "> <span>Main Page</span></a>
                           </li>
                           <li>
                              <a href="{{ url('/profile') }}"> <span>Clinic Profile</span></a>
                           </li>
                        </ul>
                     </li> -->
                    
                     <li>
                            <a href="{{ url('/main') }}">
                            <i class="fa-solid fa-home"></i> <span>Main</span></a>
                        </li>

                        <li>
                            <a href="{{ url('/profile') }}">
                            <i class="fa-regular fa-address-card"></i> <span>Clinic Profile</span></a>
                        </li>   

                        <li>
                            <a href="{{ url('/bookSetting') }}">
                            <i class="fa-solid fa-gear"></i> <span>Appointment Setting</span></a>
                        </li>
                     
                        <li>
                            <a href="{{ url('/cal') }}">
                            <i class="fa fa-calendar"></i> <span>Calender</span></a>
                        </li>

                        <li>
                            <a href="{{ url('#Appointment') }}" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle"><i class="fa fa-edit"></i> <span>Appointment</span></a>
                            <ul class="collapse list-unstyled" id="Appointment">
                                <li><a href="{{ url('/booking') }}"> <span>All Appointment</span></a></li>
                                <li><a href="{{ url('/addbook') }}"> <span>Add Appointment</span></a></li>
                                <li><a href="{{ url('/deletedebook') }}"> <span>Delete Appointment</span></a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ url('#Doctors') }}" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle"><i class="fa fa-user-doctor "></i> <span>Doctors</span></a>
                            <ul class="collapse list-unstyled" id="Doctors">

                                <li><a href="{{ url('/doctorsAdmin') }}"> <span>All Doctors</span></a></li>
                                <li><a href="{{ url('/addDoctor') }}"> <span>Add Doctors</span></a></li>
                                <li><a href="{{ url('/removedDoc') }}"> <span>Removed Doctors</span></a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="{{ url('/usersAdmin') }}">
                                <i class="fa fa-users "></i> <span>Users</span></a>
                        </li>
                  
                    </ul>
                </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <div class="topbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i
                                    class="fa fa-bars"></i></button>
                            <div class="logo_section">
                                <a href="{{ url('/main') }}"><img class="img-responsive"
                                        src="{{ asset('/img/alogo.png') }}" alt="#" /></a>
                            </div>
                            <div class="right_topbar">
                                <div class="icon_info">
                        
                                    <ul class="user_profile_dd">
                                        <li>
                                            @if(Session::get('clinic_img'))
                                            <a class="dropdown-toggle" data-toggle="dropdown"><img
                                                    class="img-responsive rounded-circle"
                                                    src="{{ asset('/storage/img/'.Session::get('clinic_img')) }}"
                                                    alt="#" /><span
                                                    class="name_user">{{Session::get('clinic_name')}}</span></a>
                                            @else
                                            <a class="dropdown-toggle" data-toggle="dropdown"><img
                                                    class="img-responsive rounded-circle"
                                                    src="{{ asset('/img/person-icon.png') }}" alt="#" /><span
                                                    class="name_user">{{Session::get('clinic_name')}}</span></a>
                                            @endif
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ url('/profile') }}">My Profile</a>
                                                <a class="dropdown-item" href="{{ url('/changePass') }}">Change Password</a>
                                                <!-- <a class="dropdown-item" href="{{ url('/') }}">Settings</a>
                                       <a class="dropdown-item" href="{{ url('/') }}">Help</a> -->
                                                <a class="dropdown-item" href="{{ url('/logout') }}"><span>Log
                                                        Out</span> <i class="fa fa-sign-out"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>