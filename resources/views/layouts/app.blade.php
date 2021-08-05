<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DeliveBoo') }}</title>
    {{-- <title>@yield( 'title' )</title> --}}

    @yield( 'headerscripts')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- https://fontawesome.com/v4.7.0/icons/ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body id="body">
<!-- Dark overlay -->
                    <div id="darkoverlay"></div>
    <nav class="navbar_my navbar-expand-md navbar-light">
        <div class="big-container">
            <div class="container_my hero">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/loghi/NavBar-WhiteLogo2.png')}}" alt="">
                </a>

                <div class="navbar_my">

                    <!-- Right Side Of Navbar -->

                    <div id="mySidenav" class="sidenav">
                        <div class="sidenav-logo">
                            <img src="{{ asset('img/loghi/colored-logo-sidenav-overlay2.png')}}" alt="">
                        </div>
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        @guest
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        @endif
                        @else
                        <a id="cursor-default" class="nav-link " href="{{route('admin.restaurants.index')}}">
                            <i class="fas fa-user-shield"></i>
                            I miei ristoranti
                        </a>
                        <a class="nav-link" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-user"></i>
                            {{ Auth::user()->name }}
                        </a>
                            <a id="signout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>{{ __('Logout') }}</p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                        
                    </div>

                    <!-- Use any element to open the sidenav -->
                    <button onclick="openNav()" class='btn-default'><i class="fas fa-bars"></i>Menu</button>

                    
                    <script>
                        /* Set the width of the side navigation to 250px */
                        function openNav() {
                            document.getElementById("mySidenav").style.width = "250px";
                            document.getElementById("darkoverlay").classList.add("activedarkoverlay");
                            document.getElementById("body").classList.add("noscroll");
                        }

                        /* Set the width of the side navigation to 0 */
                        function closeNav() {
                            document.getElementById("mySidenav").style.width = "0";
                            document.getElementById("darkoverlay").classList.remove("activedarkoverlay");
                            document.getElementById("body").classList.remove("noscroll");
                        }

                    </script>

                    {{-- <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.restaurants.index')}}">
                    Visita la Dashboard
                    </a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    </ul> --}}
                </div>
            </div>
        </div>

    </nav>

    <main id="app">
        @yield('content')
    </main>

    @include('partials.footer')

    @yield('scripts')
</body>
</html>
