<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>@yield('title','GCMG - Admin Resource Management System')</title>

    @include('includes.admin.header')
</head>
<body>
    <div id="wrapper">
        @guest
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                
                <div class="collapse navbar-collapse" >
                    <!-- Left Side Of Navbar -->
                    <a class="navbar-brand " href="{{ url('/') }}">
                        {{ config('app.name', 'GCMG') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        
                    </ul>
                </div>
            </nav> 

        <main>
            @yield('content')
        </main>

        @else

            <div id="wrapper">
                <!-- ========== Left Sidebar Start ========== -->
                
                @include('includes.admin.left_sidebar')

                <div class="content-page">
                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">

                            <ul class="list-unstyled topbar-right-menu float-right mb-0">

                                <li class="hide-phone app-search">
                                    <form>
                                        <input type="text" placeholder="Search..." class="form-control">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </li>

                                <li class="dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <i class="fi-bell noti-icon"></i>
                                        {{-- <span class="badge badge-danger badge-pill noti-icon-badge"></span> --}}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Notification</h5>
                                        </div>

                                        <div class="slimscroll" style="max-height: 230px;">
                                            <!-- item-->
                                            {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                                <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                                            </a> --}}

                                            <!-- item-->
                                           {{--  <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                                                <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>
                                            </a> --}}

                                            <!-- item-->
                                           {{--  <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
                                                <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days ago</small></p>
                                            </a> --}}

                                            <!-- item-->
                                           {{--  <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i></div>
                                                <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
                                            </a> --}}

                                            <!-- item-->
                                           {{--  <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="notify-icon bg-purple"><i class="mdi mdi-account-plus"></i></div>
                                                <p class="notify-details">New user registered.<small class="text-muted">7 days ago</small></p>
                                            </a> --}}

                                            <!-- item-->
                                            {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="notify-icon bg-custom"><i class="mdi mdi-heart"></i></div>
                                                <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">13 days ago</small></p>
                                            </a> --}}
                                        </div>

                                        <!-- All-->
                                        {{-- <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                            View all <i class="fi-arrow-right"></i>
                                        </a> --}}

                                    </div>
                                </li>

                                <li class="dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <i class="fi-speech-bubble noti-icon"></i>
                                        {{-- <span class="badge badge-custom badge-pill noti-icon-badge">6</span> --}}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Chat</h5>
                                        </div>

                                        <div class="slimscroll" style="max-height: 230px;">
                                            <!-- item-->
                                            {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="notify-icon"><img src="{{asset('admin_assets/assets/images/users/avatar-2.jpg')}}" class="img-fluid rounded-circle" alt="" /> </div>
                                                <p class="notify-details">Cristina Pride</p>
                                                <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next meeting</p>
                                            </a>
 --}}
                                            <!-- item-->
                                           {{--  <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="notify-icon"><img src="{{asset('admin_assets/assets/images/users/avatar-3.jpg')}}" class="img-fluid rounded-circle" alt="" /> </div>
                                                <p class="notify-details">Sam Garret</p>
                                                <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                                            </a> --}}

                                            <!-- item-->
                                           {{--  <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="notify-icon"><img src="{{asset('admin_assets/assets/images/users/avatar-4.jpg')}}" class="img-fluid rounded-circle" alt="" /> </div>
                                                <p class="notify-details">Karen Robinson</p>
                                                <p class="text-muted font-13 mb-0 user-msg">Wow that's great</p>
                                            </a> --}}

                                            <!-- item-->
                                            {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="notify-icon"><img src="{{asset('admin_assets/assets/images/users/avatar-5.jpg')}}" class="img-fluid rounded-circle" alt="" /> </div>
                                                <p class="notify-details">Sherry Marshall</p>
                                                <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next meeting</p>
                                            </a> --}}

                                            <!-- item-->
                                            {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="notify-icon"><img src="{{asset('admin_assets/assets/images/users/avatar-6.jpg')}}" class="img-fluid rounded-circle" alt="" /> </div>
                                                <p class="notify-details">Shawn Millard</p>
                                                <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                                            </a> --}}
                                        </div>

                                        <!-- All-->
                                        {{-- <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                            View all <i class="fi-arrow-right"></i>
                                        </a> --}}

                                    </div>
                                </li>

                                <li class="dropdown notification-list">
                                    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <img src="{{asset('admin_assets/assets/images/users/avatar-1.jpg')}}" alt="user" class="rounded-circle"> <span class="ml-1">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h6 class="text-overflow m-0">Welcome ! {{ Auth::user()->name }} </h6>
                                        </div>

                                        <!-- item-->
{{--                                         <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="fi-head"></i> <span>My Account</span>
                                        </a> --}}
                                                                
                                        <a class="fi-power dropdown-item notify-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="float-left">
                                    <button class="button-menu-mobile open-left disable-btn">
                                        <i class="dripicons-menu"></i>
                                    </button>
                                </li>
                                <li>  

                                    <div class="page-title-box">
                                        @yield('Top Bar title')
                                    </div>
                                    
                                </li>

                            </ul>

                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    

                    @yield('content')

                    <!-- End Content Yielding-->


                    @include('includes.admin.footer')

                </div>
                <!-- Page content End -->


                <!-- ============================================================== -->
                <!-- End Right content here -->
                <!-- ============================================================== -->
            </div>
       
        
            @include('includes.admin.scripts')


            @yield('scripts')

        @endguest
    </div>
</body>
</html>
