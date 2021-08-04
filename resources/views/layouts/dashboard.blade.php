<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Custom fonts for this template-->

    <!-- https://fontawesome.com/v4.7.0/icons/ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('librery')

    <title>{{ config('app.name', 'DeliveBoo') }}</title>
</head>
<body>

    <div class="admin-container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/loghi/white-logo.png')}}" alt="">
            </a>
            <button class="navbar-toggler my-navbar-toggler nav-item-ut" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                {{-- <span class="navbar-toggler-icon"></span> --}}
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 my-navbar-collapse">
                    <i class="fa fa-caret-up my-caret-up" aria-hidden="true"></i>
                    <li>
                        <a class="nav-link" href="{{route('admin.restaurants.index')}}">
                            <span>
                                <i class="fa fa-cutlery responsive-i" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.restaurants.create') }}">
                            <span>
                                <i class="fa fa-plus responsive-i" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.statistics')}}">
                            <span>
                                <i class="fa fa-bar-chart responsive-i" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">
                            <span>
                                <i class="fa fa-cart-plus responsive-i" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link-ut" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out responsive-i logout-i" aria-hidden="true"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>

            </div>
            <div class="logout-container nav-item-ut">
                <a class="nav-link-ut" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </nav>
        <div class="wrapper">
            <nav id="sidebar" class="col-md-3">
                <ul class="list-unstyled components">
                    <li class="active">
                        <a class="nav-link" href="{{route('admin.restaurants.index')}}">
                            <span>
                                <i class="fa fa-cutlery" aria-hidden="true"></i>
                                <p>I tuoi ristoranti</p>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.restaurants.create') }}">
                            <span>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                <p>Aggiungi un ristorante</p>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('admin.statistics')}}">
                            <span>
                                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                <p>Vendite</p>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">
                            <span>
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                <p>Ordini</p>
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4 py-4">
                <div id="app">
                    @yield('content')
                </div>
            </main>
        </div>

        {{-- <div class="container-fluid">
            <div class="row">
                <nav class="col-md-3 d-none d-md-block bg-light sidebar py-4">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column"><li class="nav-item">
                                <a class="nav-link" href="{{route('admin.restaurants.index')}}">
        <i class="fa fa-cutlery" aria-hidden="true"></i>
        I miei ristoranti
        </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.restaurants.create') }}">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Aggiungi il tuo ristorante
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.statistics')}}">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                Sales
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                Menu
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                Ordini
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.types.index')}}">
                <i class="fa fa-tags" aria-hidden="true"></i>
                Tipologie
            </a>
        </li>
        </ul>
    </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4 py-4">
        <div id="app">
            @yield('content')
        </div>
    </main>

    </div>
    </div> --}}

    </div>
    @include('partials.footer')
</body>


{{-- <script src="{{ asset('js/chart-area-demo.js') }}"></script>
<script>
    var myChart = new Chart(ctx, {
        ...
    });

</script>

<script src="{{ asset('js/charts.js') }}"></script> --}}
@yield( 'scripts' )
</html>
