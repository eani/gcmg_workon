<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

    <div class="slimscroll-menu" id="remove-scroll">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="/home" class="logo">
                <span>
                    <img src="{{asset('admin_assets/assets/images/logo.jpg')}}" alt="" height="200">
                </span>
            </a>
        </div>

        <!-- User box -->
        <div class="user-box">
        </div>                     {{-- very much needed for spacing --}}
        <div class="user-box">
            <div class="user-img">
                <img src="{{asset('admin_assets/assets/images/users/avatar-1.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
            </div>
            <h5><a href="#">Hi! {{ Auth::user()->name }}</a> </h5>
            <p class="text-muted">Admin</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <!--<li class="menu-title">Navigation</li>-->

                <li>
                    <a href="/home">
                        <i class="fi-air-play"></i><span class="badge badge-danger badge-pill pull-right"></span> <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="/downloads/view-all">
                        <i class="fi-air-play"></i><span class="badge badge-danger badge-pill pull-right"></span> <span> Downloads </span>
                    </a>
                </li>
                
                <li>
                    <a href="javascript: void(0);"><i class="dripicons-view-apps"></i><span> Category Creation </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/categories/create">Create New </a></li>
                        <li><a href="/categories/view-all">View All </a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="mdi mdi-cellphone-link"></i><span> Application Media </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/applications/create">Create New </a></li>
                        <li><a href="/applications/view-all">View All </a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="mdi mdi-headset"></i><span> Audio Media </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/audio/create">Create New </a></li>
                        <li><a href="/audio/view-all">View All </a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fi-paper"></i> <span> Book Media </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/books/create">Create New </a></li>
                        <li><a href="/books/view-all">View All </a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="mdi mdi-camcorder"></i> <span> Video Media </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/videos/create">Create New </a></li>
                        <li><a href="/videos/view-all">View All </a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);"><i class="fi-share"></i> <span> Multi Level </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="false">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" aria-expanded="false">Level 1.2 <span class="menu-arrow"></span></a>
                            <ul class="nav-third-level nav" aria-expanded="false">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>

        </div>
        <!-- Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
            <!-- Left Sidebar End -->