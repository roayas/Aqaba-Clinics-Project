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
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
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
                        <a href="{{ url('/') }}"><img class="logo_icon img-responsive" src="{{ asset('img/alogo.png') }}" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="{{ asset('/') }}" alt="#" /></div>
                        <div class="user_info">
                           <h6>John David</h6>
                          
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="{{ url('#dashboard') }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard "></i> <span>Dashboard</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                           <li>
                              <a href="{{ url('/') }}">> <span>Default Dashboard</span></a>
                           </li>
                           <li>
                              <a href="{{ url('/') }}">> <span>Dashboard style 2</span></a>
                           </li>
                        </ul>
                     </li>
                     <li><a href="{{ url('/') }}"><i class="fa fa-clock-o "></i> <span>Widgets</span></a></li>
                     <li>
                        <a href="{{ url('/') }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond "></i> <span>Elements</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="{{ url('/') }}">> <span>General Elements</span></a></li>
                           <li><a href="{{ url('/') }}">> <span>Media Gallery</span></a></li>
                           <li><a href="{{ url('/') }}">> <span>Icons</span></a></li>
                           <li><a href="{{ url('/') }}">> <span>Invoice</span></a></li>
                        </ul>
                     </li>
                     <li><a href="{{ url('/') }}"><i class="fa fa-table "></i> <span>Tables</span></a></li>
                     <li>
                        <a href="{{ url('/') }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group "></i> <span>Apps</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="{{ url('/') }}">> <span>Email</span></a></li>
                           <li><a href="{{ url('/') }}">> <span>Calendar</span></a></li>
                           <li><a href="{{ url('/') }}">> <span>Media Gallery</span></a></li>
                        </ul>
                     </li>
                     <li><a href="{{ url('/') }}"><i class="fa fa-briefcase "></i> <span>Pricing Tables</span></a></li>
                     <li>
                        <a href="{{ url('/') }}">
                        <i class="fa fa-paper-plane "></i> <span>Contact</span></a>
                     </li>
                     <li class="active">
                        <a href="{{ url('/') }}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone "></i> <span>Additional Pages</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li>
                              <a href="{{ url('/') }}">> <span>Profile</span></a>
                           </li>
                           <li>
                              <a href="{{ url('/') }}">> <span>Projects</span></a>
                           </li>
                           <li>
                              <a href="{{ url('/') }}">> <span>Login</span></a>
                           </li>
                           <li>
                              <a href="{{ url('/') }}">> <span>404 Error</span></a>
                           </li>
                        </ul>
                     </li>
                     <li><a href="{{ url('/') }}"><i class="fa fa-map "></i> <span>Map</span></a></li>
                     <li><a href="{{ url('/') }}"><i class="fa fa-bar-chart-o "></i> <span>Charts</span></a></li>
                     <li><a href="{{ url('') }}"><i class="fa fa-cog "></i> <span>Settings</span></a></li>
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
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="{{ url('/') }}"><img class="img-responsive" src="{{ asset('/img/alogo.png') }}" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="{{ url('/') }}"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="{{ url('/') }}"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="{{ url('/') }}"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{ asset('/') }}" alt="#" /><span class="name_user">John David</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="{{ url('/') }}">My Profile</a>
                                       <a class="dropdown-item" href="{{ url('/') }}">Settings</a>
                                       <a class="dropdown-item" href="{{ url('/') }}">Help</a>
                                       <a class="dropdown-item" href="{{ url('/') }}"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>