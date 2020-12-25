<!doctype html>
<html lang="{{config('app.locale')}}" dir="{{config('app.direction')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Byrgenwerth') }} | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- JS, Popper.js, and jQuery -->


    <!-- Styles -->

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
    <link href="{{ asset('fa/css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user-o fa-lg mb-2" aria-hidden="true"></i> {{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus fa-lg mb-2" aria-hidden="true"></i> {{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-lg-left" aria-labelledby="navbarDropdown">

                                <a href="{{route('dashboard')}}" class="dropdown-item"><i class="fa fa-dashboard"></i> {{__("Dashboard")}}</a>
                                <a href="{{route('articles.index')}}" class="dropdown-item"><i class="fa fa-files-o"></i> {{__("Articles")}}</a>


                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-user-times"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

                <a class="text-info nav-link" href="{{ route('locale.setting', 'en') }}">
                    <i class="fa fa-language"></i> EN
                </a>


                <a class="text-info nav-link" href="{{ route('locale.setting', 'ar') }}">
                   <i class="fa fa-language"></i> AR
                </a>

            </div>
        </div>
    </nav>


    <main class="py-4 container">
        @if($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        @yield('content')

    </main>
</div>

<footer>
    <div class="card-footer mt-lg-5 text-center">
        <a href="{{route('index')}}" class="text-info btn btn-link" style="text-decoration: none"> <i class="fa fa-home"></i> {{__("Home")}}</a>
        <a href="{{route('articles.index')}}" class="text-info btn btn-link"
           style="text-decoration: none"> <i class="fa fa-files-o"></i> {{__("Browse all articles")}}</a>
        @auth
            <a href="{{route('dashboard')}}" class="text-info btn btn-link"
               style="text-decoration: none"><i class="fa fa-dashboard"></i> {{__("Dashboard")}}</a>

        @endauth
        <a href="{{route('contact')}}" class="text-info btn btn-link" style="text-decoration: none"> <i class="fa fa-file-text-o"></i> {{__("Contact us")}}</a>


    </div>
</footer>
</body>
</html>
