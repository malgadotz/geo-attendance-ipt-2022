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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/boxicons.min.css')}}">

   

    
    <!----===== Boxicons CSS ===== -->
    <link href="{{asset('https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css')}}" rel='stylesheet'>
    
    <!-- <title>Dashboard Sidebar Menu</title>  -->
    @livewireStyles
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{asset('assets/img/logo.ico')}}" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Attendance</span>
                    <span class="profession">{{ Auth::user()->name }}</span>
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

                    @if ( Auth::user()->role  == 'Student')

<li class="nav-link">
                <a href="{{url('student/dashboard')}}">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                    <a href="{{url('student/attendence/view')}}">
                            <i class='bx bx-fingerprint icon' ></i>
                            <span class="text nav-text">Attendence</span>
                        </a>
                    </li>

                    <!-- <li class="nav-link">
                    <a href="{{url('#')}}">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{url('#')}}">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li> -->
                   
                    <li class="nav-link">
                        <a href="{{url('student/student/view')}}">
                            <i class='fas fa-users icon' ></i>
                            <span class="text nav-text">Students</span>
                        </a>
                    </li>

                    <!-- <li class="nav-link">
                    <a href="{{url('#')}}">
                            <i class='bx bx-folder-open icon' ></i>
                            <span class="text nav-text">Reports</span>
                        </a>
                    </li> -->
                    <li class="nav-link">
                    <a href="{{url('student/course/view')}}">
                            <i class='bx bx-briefcase icon' ></i>
                            <span class="text nav-text">Course</span>
                    </a>
                    </li>
                    <li class="nav-link">
                    <a href="{{url('student/program/view')}}">
                            <i class='bx bxs-school icon' ></i>
                            <span class="text nav-text">Program</span>
                        </a>
                    </li>
                    <li class="nav-link">
                    <a href="{{url('student/venue/view')}}">
                            <i class='bx bx-buildings icon' ></i>
                            <span class="text nav-text">Venue</span>
                        </a>
                    </li>
                    <li class="nav-link">
                    <a href="{{url('student/session/view')}}">
                            <i class='bx bx-timer icon' ></i>
                            <span class="text nav-text">Session</span>
                        </a>
                    </li>
                    @endif
                                    <!-- </ul> -->
            </div>

            <div class="bottom-content">
                <li class="">
                <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                      
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
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
               
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class='bx bx-log-out icon' ></i>
                        <span class="">{{ __('Logout') }}</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="changepassword"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <!-- {{ __('Change pasword') }} -->
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">@yield('content')</div>
        
</div>
    <script src="{{asset('assets/script.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
    @livewireScripts
</body>
</html>