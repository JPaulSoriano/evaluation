<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UCS Faculty Evaluation System</title>

    @yield('styles')
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/print.min.css') }}" rel="stylesheet">
    <style>
    body {
    margin-bottom: 60px;
    }
    html {
    position: relative;
    min-height: 100%;
    }
    .footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    /* Set the fixed height of the footer here */
    height: 60px;
    line-height: 60px; /* Vertically center the text there */
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" width="50" height="50" alt=""> UCS Faculty Evaluation System
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> -->
                            @if (Route::has('register'))
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> -->
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                            </li>
                            @can('student')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('evaluations') }}">{{ __('Evaluation') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('myevaluations') }}">{{ __('My Evaluations') }}</a>
                                </li>
                            @endcan
                            @can('admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('questions.index') }}">{{ __('Questions') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('sections.index') }}">{{ __('Grade and Section') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('subjects.index') }}">{{ __('Subjects') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('academicyears.index') }}">{{ __('A.Y') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.index') }}">{{ __('Users') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('roles.index') }}">{{ __('Roles') }}</a>
                                </li>
                            @endcan
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->full_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
        <footer class="footer mt-auto bg-primary">
        <div class="container">
            <div class="row">
            <div class="col-md-6">
                <span class="text-white">© Pangasinan State University San Carlos Campus</span>
            </div>
            <div class="col-md-6 text-md-right">
                    <span class="text-white text-right">Dev: 09126035959</span>
                </div>
            </div>
        </div>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script src="{{ asset('js/print.min.js') }}"></script>
    <script type="text/javascript">
        $('.date-own').datepicker({
           minViewMode: 2,
           format: 'yyyy'
         });
    </script>
     @yield('scripts')

</body>
</html>
