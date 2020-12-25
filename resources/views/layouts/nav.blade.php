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

            <a class="text-info nav-link" href="{{ route('locale.setting', 'ar') }}">AR <i class="fa fa-language"></i>
            </a>


            <a class="text-info nav-link" href="{{ route('locale.setting', 'en') }}">
                <i class="fa fa-language"></i> EN
            </a>

        </div>
    </div>
</nav>
