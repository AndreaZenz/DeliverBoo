@extends('layouts.dashboard')

@section('content')

<div class="container">
    @if($restaurant->img_url)
    <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
    @endif
    <h1>{{$restaurant->name}}</h1>
    <p>{{$restaurant->address}}</p>

    <a class="btn btn-primary mg-top-bot-10" href=" {{ route('admin.restaurants.dishes.create', $restaurant->id) }} ">Crea un piatto</a>
    <div class="container">

        @foreach ($dishes as $dish)
        <div class="col-12">
            <div class="card mg-top-bot-10" style="width: 100%;">
                @if($dish->img_url)
                <img src="{{ asset('storage/' . $dish->img_url) }}" class="img-fluid card-img-top" style="width: 100%; max-height: 150px; object-fit: cover">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $dish->name }}</h5>
                    <h4 class="card-text">{{ $dish->price }}</h4>
                    <p class="card-text">{{ $dish->description }}</p>
                    <p class="card-text">{{ $dish->ingredient_list }}</p>
                    <a href=" {{ route('admin.restaurants.dishes.edit', [$dish->restaurants_id, $dish->id]) }} " class="btn mg-top-bot-10 btn-warning">Modifica</a>

                    <a href=" {{ route('admin.restaurants.dishes.edit', [$dish->restaurants_id, $dish->id]) }} ">Modifica</a>

                    <form action=" {{ route('admin.restaurants.dishes.destroy', [$dish->restaurants_id, $dish->id]) }} " method="post" class="delete_form">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Cancella" class="btn btn-danger spacing">
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        {{-- @include('admin.dishes.index', $restaurant->id) --}}

    </div>

    {{--
    funziona
    <button type="button" class="btn btn-info spacing">
        <a href=" {{ route('admin.restaurants.dishes.index', $restaurant->id) }} ">Visualizza i piatti</a>
    </button>
    --}}

</div>

@endsection
