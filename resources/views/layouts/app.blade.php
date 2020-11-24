<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task Management') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    <link href="{{ asset('assets/css/argon.css?v=1.2.0') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @guest
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Task Management') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                            @if(Auth::user()->id == '0')

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    History
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('user.index')}}">Show Users</a>
                                    <a class="dropdown-item" href="{{route('task.index')}}">Show Tasks</a>
                                    <a class="dropdown-item" href="{{route('notification.index')}}">Show Notifications</a>
                                </div>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @if(Auth::user()->id == '0')
                                        <a class="dropdown-item" href="{{route('user.create')}}">Generate User</a>
                                        <a class="dropdown-item" href="{{route('task.create')}}">Define Task</a>
                                        <a class="dropdown-item" href="{{route('notification.create')}}">Generate Notification</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('task.show', ['task' => Auth::user()->id]) }}">Show Task</a>
                                        <a class="dropdown-item" href="{{route('notification.show', ['notification' => Auth::user()->id])}}">Show Notification</a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
        @else
            <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
                <div class="scrollbar-inner">
                    <!-- Brand -->
                    <div class="sidenav-header  align-items-center">
                        <a class="navbar-brand" href="javascript:void(0)">
                            <img src="{{asset('assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
                        </a>
                    </div>
                    <div class="navbar-inner">
                        <!-- Collapse -->
                        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                            <!-- Nav items -->
                            @if(Auth::user()->id == 0)
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('home')}}">
                                            <i class="ni ni-tv-2 text-primary"></i>
                                            <span class="nav-link-text">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('user.index')}}">
                                            <i class="ni ni-single-02 text-yellow"></i>
                                            <span class="nav-link-text">All User</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('task.index')}}">
                                            <i class="ni ni-bullet-list-67 text-default"></i>
                                            <span class="nav-link-text">All Task</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('notification.index')}}">
                                            <i class="ni ni-send text-dark"></i>
                                            <span class="nav-link-text">All Notification</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('comment.index')}}">
                                            <i class="ni ni-email-83 text-dark"></i>
                                            <span class="nav-link-text">Comments</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="ni ni-key-25 text-info"></i>
                                            <span class="nav-link-text">Logout</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            @else
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('home')}}">
                                            <i class="ni ni-tv-2 text-primary"></i>
                                            <span class="nav-link-text">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('task.show',['task' => Auth::user()->id])}}">
                                            <i class="ni ni-bullet-list-67 text-default"></i>
                                            <span class="nav-link-text">Show Tasks</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('notification.show', ['notification' => Auth::user()->id])}}">
                                            <i class="ni ni-send text-dark"></i>
                                            <span class="nav-link-text">Show Notification</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('message.create')}}">
                                            <i class="ni ni-email-83 text-dark"></i>
                                            <span class="nav-link-text">Messages</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('message.show', ['message' => Auth::user()->id])}}">
                                            <i class="ni ni-email-83 text-dark"></i>
                                            <span class="nav-link-text">Show Messages</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="ni ni-key-25 text-info"></i>
                                            <span class="nav-link-text">Logout</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            @endif
                            @if(Auth::user()->id == 0)
                                <hr class="my-3">
                                <!-- Heading -->
                                <h6 class="navbar-heading p-0 text-muted">
                                    <span class="docs-normal">Generate Something</span>
                                </h6>
                                <ul class="navbar-nav mb-md-3">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('user.create')}}">
                                            <i class="ni ni-single-02 text-yellow"></i>
                                            <span class="nav-link-text">Generate User</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('task.create')}}">
                                            <i class="ni ni-palette"></i>
                                            <span class="nav-link-text">Define Task</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('subtask.create')}}">
                                            <i class="ni ni-palette"></i>
                                            <span class="nav-link-text">Define Subtask</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('notification.create')}}">
                                            <i class="ni ni-ui-04"></i>
                                            <span class="nav-link-text">Generate Notification</span>
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        @endguest

        <main class="py-4">
            @yield('content')
        </main>
    </div>



    <script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <!-- Optional JS -->
    <script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <!-- Argon JS -->
    <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
</body>
</html>
