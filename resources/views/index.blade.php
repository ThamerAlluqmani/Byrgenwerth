@section('title', __("Home"))
    <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>{{ config('app.name', 'Byrgenwerth') }} | @yield('title')</title>
    @include('layouts.scripts')
    <style>
        body {
            font-family: 'Cairo', sans-serif;

        }

        a {
            text-decoration: none;

        }

        #intro {
            background-image: url('background.png');
            background-size: cover;
            background-position: center;
            height: 350pt;
            position: relative;
        }

        #text {
            position: absolute;
            bottom: 0pt;
            width: 100%;
            background-color: #00000080;
            height: 54pt;
            color: white;
            text-align: center;
            font-size: 27pt;
        }

        #features i {
            font-size: 40pt;
        }

    </style>
</head>
<body>
@include('layouts.nav')
<div class="container-fluid">
    <div class="container shadow-lg p-0">
        <div id="intro">
            <div id="text" class="d-flex align-items-center">
                <h2 class="text-center w-100">{{__("! Our eyes are yet to open")}}</h2>
            </div>
        </div>

        <div id="features" class="mt-5">
            @if(config('app.locale') == 'ar')
                <p class="px-3 mb-5">{{__("Byrgenwerth is an old place of learning that now lies abandoned. In its day, Byrgenwerth was home to scholars, and the school was headed by Provost Willem. The students learned of history and archeology ...")}}
            @else
                <p style="text-align: left"
                   class="px-3 mb-5">{{__("Byrgenwerth is an old place of learning that now lies abandoned. In its day, Byrgenwerth was home to scholars, and the school was headed by Provost Willem. The students learned of history and archeology ...")}}

                    @endif
                    <a href="{{route('articles.show' , 3)}}">{{__("Show more")}}</a></p>


                <div class="row text-center">
                    <div class="col-md-4">
                        <ul class="navbar-nav ml-auto ">
                            <li class="nav-item">
                                <a class="nav-link text-info"
                                   href="{{route('articles.index')}}">
                                    <i class="fa fa-files-o fa-lg mb-2" aria-hidden="true"></i>
                                    <br>
                                    {{__("Articles")}}</a>

                                <p>{{__("Browse all articles")}}</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        @auth
                            <ul class="navbar-nav ml-auto ">
                                <li class="nav-item">
                                    <a class="nav-link text-info"
                                       href="{{route('articles.create')}}">
                                        <i class="fa fa-file-text-o fa-lg mb-2" aria-hidden="true"></i>
                                        <br>
                                        {{__("Create new article")}}</a>

                                    <p>{{__("Create an article")}}</p>
                                </li>
                            </ul>
                        @endauth
                        @guest
                            <ul class="navbar-nav ml-auto ">
                                <li class="nav-item">
                                    <a class="nav-link text-info"
                                       href="{{route('register')}}">
                                        <i class="fa fa-user-plus fa-lg mb-2" aria-hidden="true"></i>
                                        <br>
                                        {{__("Register")}}</a>

                                    <p>{{__("Create your first new article")}}</p>
                                </li>
                            </ul>

                        @endguest
                    </div>
                    <div class="col-md-4">
                        <ul class="navbar-nav ml-auto ">
                            <li class="nav-item">
                                @auth
                                    <a class="nav-link text-info"
                                       href="{{route('dashboard')}}">
                                        <i class="fa fa-dashboard fa-lg mb-2" aria-hidden="true"></i>
                                        <br>
                                        {{__("Dashboard")}}</a>

                                    <p>{{__("Control your data")}}</p>
                                @endauth
                                @guest
                                    <a class="nav-link text-info"
                                       href="{{route('contact')}}">
                                        <i class="fa fa-file-text-o fa-lg mb-2" aria-hidden="true"></i>
                                        <br>
                                        {{__("Contact us")}}</a>

                                    <p>{{__("Tell us what you want to talk about it")}}</p>
                                @endguest
                            </li>
                        </ul>
                    </div>
                </div>
                <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
        </div>
        <div class="card mt-5">


            <div class="card-header">
                <h3 class="text-muted text-center"><i class="fa fa-files-o"></i> {{__("Latest articles")}}</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    @forelse($articles as $article)

                        @include('articles._article-template')

                    @empty
                        {{__("No articles yet")}}
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>


