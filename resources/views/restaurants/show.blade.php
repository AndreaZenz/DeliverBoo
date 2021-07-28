<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- https://fontawesome.com/v4.7.0/icons/ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container hero">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/loghi/NavBar-WhiteLogo.svg')}}" alt="">
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.home_login') }}">
                                Visita la Dashboard
                            </a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="card" style="width: 100%;">
                    <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
                    <div class="card-body">
                        <h5 class="card-title">{{$restaurant->name}}</h5>
                        <p class="card-text">{{$restaurant->address}}</p>
                        {{-- @if(count($restaurant->types) > 0) --}}
                        {{-- @foreach($restaurant->types as $type)
            <span class="badge badge-primary">{{ $type->name }}</span>
                        @endforeach --}}
                        {{-- @else
            <p>Nessun tag disponibile...</p>
            @endif --}}
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-8">

                                @foreach ($dishes as $dish)
                                <div class="card">
                                    <img src="{{ asset('storage/' . $dish->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
                                    <div class="card-body">
                                        <h5 class="card-title">Name:{{$dish->name}}</h5>
                                        <p class="card-text">Description:{{$dish->description}}</p>
                                        <p class="card-text">Ingredients:{{$dish->ingredient_list}}</p>
                                        <p class="card-text">Price:{{$dish->price}}</p>
                                    </div>
                                    <span>
                                        <a class="btn-link">
                                            <i class="fas fa-plus-circle" @click=" AddToCart( {{$dish->name}}, {{ $dish->price }})"></i>
                                        </a>
                                        <a class="btn-link" href="#">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </span>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-4">


                                {{-- carrello --}}

                                {{-- memo aggiungere v-if cart non vuoto --}}
                                <div class="shop_cart" >

                                    <div id="shop_cart_top">

                                        {{-- save order and go to Payment.index --}}
                                        <a href="{{ route('payment.index') }}">
                                            <button type="button" class="btn btn-info spacing" @click="">Go To Checkout</button>
                                        </a>


                                        <ul>
                                            <li v-for="(item,index) in cart_dishes" class="clearfix">

                                                <div class="cart_left_div">
                                                    <i class="fas fa-minus-circle" @click="plate_minus(index)"></i> <span>@{{ item.amount }}</span> <i class="fas fa-plus-circle" @click="plate_plus(index)"></i>
                                                </div>

                                                <div class="cart_middle_div">
                                                    @{{ item.name }}
                                                </div>

                                                <div class="cart_right_div">
                                                    @{{ item.price.toLocaleString("it-IT", {'minimumFractionDigits':2,'maximumFractionDigits':2}) }}€
                                                </div>

                                            </li>
                                        </ul>
                                    </div>

                                    <div id="shop_cart_bottom">
                                        <div id="shop_cart_bottom_delivery">
                                            <div>Delievery fees</div>
                                            <div>@{{ delivery.toLocaleString("it-IT", {'minimumFractionDigits':2,'maximumFractionDigits':2}) }}€</div>
                                        </div>

                                        <div id="shop_cart_bottom_total">
                                            <div>Total</div>
                                            <div id="item_plate" class="price_animation">@{{ tot_price.toLocaleString("it-IT", {'minimumFractionDigits':2,'maximumFractionDigits':2}) }}€</div>
                                        </div>
                                    </div>

                                </div>

                                <div class="shop_cart">
                                    <a href="#">
                                        <button type="button" class="btn btn-info spacing">Go To Checkout</button>
                                    </a>
                                    <div class="shop_cart_empty_content">Empty cart</div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>

    @include('partials.footer')
    </div>
</body>
<script src="{{ mix('js/cartScript.js') }}">

</script>
</html>
