<!doctype html>
<html lang="{{config('app.locale')}}" dir="{{config('app.direction')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Byrgenwerth') }} | @yield('title')</title>



    @include('layouts.scripts')
</head>
<body>
<div id="app">
    @include('layouts.nav')
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
