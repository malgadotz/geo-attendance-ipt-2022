<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.80">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Cive-attendance', 'Cive-attendance') }}</title>
    <link rel="shortcut icon" href="{{asset('assets/img/logo.ico')}}" type="image/x-icon">
    <script src="{{ asset('assets/js/alert.min.js') }}" defer></script>
    <script src="{{asset('https://unpkg.com/html5-qrcode')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
   
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/boxicons.min.css')}}">


    <!----===== Boxicons CSS ===== -->
    <link href="{{asset('https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css')}}" rel='stylesheet'>
    
    <!-- <title>Dashboard Sidebar Menu</title>  -->
    @livewireStyles
</head>
<!-- ASSESMENT -->
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text ">
                <span class="image text-center">
                    <img src="{{asset('assets/img/logo.ico')}}" alt="">
                </span>

                <div class="text logo-text text-center">
                    <span class="name">UDOM SAMS</span>
                    <span class="profession " style="font: size 8px;">{{ Auth()->user()->name }}</span>
                    <span class="profession">{{ Auth()->user()->role }}</span>
                </div>
            </div>

            <i class='fa fa-bars text-primary toggle bg-light'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <!-- <li class="search-box">
                    <i class='fa fa-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li> -->
                @if ( Auth::user()->role  == 'Admin')

                <!-- <ul class="menu-links"> -->
                <li class="nav-link">
                <a href="{{url('admin/dashboard')}}">
                            <i class='bx bx-grid-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                    <a href="{{url('admin/attendence/view')}}" >
                            <i class='bx bx-fingerprint icon' ></i>
                            <span class="text nav-text">Attendence</span>
                        </a>
                    </li>
                    <li class="nav-link">
                    <a href="{{url('admin/admin/add')}}" >
                            <i class='bx bx-user icon' ></i>
                            <span class="text nav-text">Administrators</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{url('admin/student/view')}}">
                            <i class='fas fa-users icon' ></i>
                            <span class="text nav-text">Students</span>
                        </a>
                    </li>                   
                    <li class="nav-link">
                        <a href="{{url('admin/studentcourse/view')}}">
                            <i class='fas fa-user-lock icon' ></i>
                            <span class="text nav-text">Student Course</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{url('admin/staff/view')}}">
                            <i class='fas fa-user-tie icon' ></i>
                            <span class="text nav-text">Staff</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{url('admin/staffcourse/view')}}">
                            <i class='fas fa-user-shield icon' ></i>
                            <span class="text nav-text">Staff Course</span>
                        </a>
                    </li>
                    <li class="nav-link">
                    <a href="{{url('admin/course/view')}}">
                            <i class='bx bx-briefcase icon' ></i>
                            <span class="text nav-text">Course</span>
                    </a>
                    </li>
                    <li class="nav-link">
                    <a href="{{url('admin/program/view')}}">
                            <i class='bx bxs-school icon' ></i>
                            <span class="text nav-text">Program</span>
                        </a>
                    </li>
                    <li class="nav-link">
                    <a href="{{url('admin/venue/view')}}">
                            <i class='bx bx-buildings icon' ></i>
                            <span class="text nav-text">Venue</span>
                        </a>
                    </li>
                    <li class="nav-link">
                    <a href="{{url('admin/session/view')}}">
                            <i class='bx bx-timer icon' ></i>
                            <span class="text nav-text">Session</span>
                        </a>
                    </li>
                    @endif
                    @if ( Auth::user()->role  == 'Staff')

<!-- <ul class="menu-links"> -->
<li class="nav-link">
<a href="{{url('staff/dashboard')}}">
            <i class='bx bx-grid-alt icon' ></i>
            <span class="text nav-text">Dashboard</span>
        </a>
    </li>

    <li class="nav-link">
    <a href="{{url('staff/attendence/view')}}" >
            <i class='bx bx-fingerprint icon' ></i>
            <span class="text nav-text">Attendence</span>
        </a>
    </li>
    <li class="nav-link">
                    <a href="{{url('staff/sms/view')}}">
                            <i class='bx bx-bell icon' ></i>
                            <span class="text nav-text">Notification</span>
                        </a>
                    </li>
    <li class="nav-link">
        <a href="{{url('staff/student/view')}}">
            <i class='fas fa-users icon' ></i>
            <span class="text nav-text">Students</span>
        </a>
    </li>                   
    <li class="nav-link">
        <a href="{{url('staff/staffcourse/view')}}">
            <i class='fas fa-briefcase icon' ></i>
            <span class="text nav-text">My Courses</span>
        </a>
    </li>
    <li class="nav-link">
    <a href="{{url('staff/venue/view')}}">
            <i class='bx bx-buildings icon' ></i>
            <span class="text nav-text">Venue</span>
        </a>
    </li>
    <li class="nav-link">
    <a href="{{url('staff/session/view')}}">
            <i class='bx bx-timer icon' ></i>
            <span class="text nav-text">Session</span>
        </a>
    </li>
    @endif
                    @if ( Auth::user()->role  == 'Student')

                <li class="nav-link">
                <a href="{{url('student/dashboard')}}">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link activeme">
                    <a href="{{url('student/attendence/view')}}">
                            <i class='bx bx-fingerprint icon' ></i>
                            <span class="text nav-text">Attendence</span>
                        </a>
                    </li>

                   
                   
                    <li class="nav-link">
                        <a href="{{url('student/studentcourse/view')}}">
                            <i class='fas fa-briefcase icon' ></i>
                            <span class="text nav-text">My courses</span>
                        </a>
                    </li>
        
                    <!-- <li class="nav-link">
                    <a href="{{url('student/qr/view')}}">
                            <i class='bx bx-scan icon' ></i>
                            <span class="text nav-text">QR</span>
                        </a>
                    </li> -->
                    <li class="nav-link">
                    <a href="{{url('student/venue/view')}}">
                            <i class='bx bx-buildings icon' ></i>
                            <span class="text nav-text">Venue</span>
                        </a>
                    </li>
                    <li class="nav-link">
                    <a href="{{url('student/session/view/student')}}">
                            <i class='bx bx-timer icon' ></i>
                            <span class="text nav-text">Session</span>
                        </a>
                    </li>
                    @endif
                                    <!-- </ul> -->
            </div>

            <div class="bottom-content">
            <li class="nav-link">
                    <a href="{{url('changepassword')}}">
                            <i class='bx bx-key icon' ></i>
                            <span class="text nav-text">change password</span>
                        </a>
                    </li> <li class="">
                <a href="{{ route('logout') }}"
                        onclick="logoutNow(event)">
                                      
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">  {{ __('Logout') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='fa fa-moon icon moon'></i>
                        <i class='fa fa-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>
    </nav>

    <div class="home home-color flex-column m-auto">
    <nav class="navbar navbar-expand-lg udom-light py-2 udomg-info text-dark shadow-sm">
            <div class="container-fluid">
            <h6 class="text-center offset-md-4" >Student Attendence Management System (SAMS)</h6>
               
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-2 navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-tog udom-inafo" href="{{ route('logout') }}"
                        onclick="logoutNow(event)">
                            [{{strtoupper(Auth::user()->name)}}]
                                  <i class='fas fa-power-off text-white icon' ></i>
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">@yield('content')</div>
        
</div>
    <!-- <script src="{{asset('js/datatables.net/js/jquery.dataTables.min.js')}}"></script> -->
    <!-- <script src="{{asset('assets/js/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script> -->
    
    <!-- <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.js')}}"></script> -->


    <script src="{{asset('assets/js/jquery-3.6.1.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
   
    <script src="{{asset('assets/qrcode.min.js')}}"></script>
    <script src="{{asset('assets/script.js')}}"></script>
    <script src="{{asset('https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js')}}"></script>
   
    @include('sweetalert::alert')
</body>
</html>