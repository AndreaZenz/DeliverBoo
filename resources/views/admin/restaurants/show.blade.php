@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="admin-main-container">
        <div class="admin-title-row">
            @if($restaurant->img_url)
            <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
            @endif
            <div class="admin-title-container">
                <h1>{{$restaurant->name}}</h1>
                <p>{{$restaurant->address}}</p>
            </div>
        </div>
        <div class="admin-cards-main">
            @foreach ($dishes as $dish)
            <div class="col-md-12 col-lg-6 admin-card-container">
                <div class="admin-card" style="width: 100%;">
                    <div class="card-name-container">
                        <h4 class="mb-0">{{ $dish->name }}</h4>
                        <div class="dropdown">
                            <button class="dropbtn">
                                <i class="fa fa-ellipsis-v text-white" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                                <a href=" {{ route('admin.restaurants.dishes.edit', [$dish->restaurant_id, $dish->id]) }} " class="btn btn-warning">Modifica Piatto</a>
                                <form action=" {{ route('admin.restaurants.dishes.destroy', [$dish->restaurant_id, $dish->id]) }} " method="post" class="delete_form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Cancella Piatto" class="btn btn-danger">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="admin-card-body-container">
                        @if($dish->img_url)
                        <div class="admin-card-img-container admin-dish-card-img">
                            <img src="{{ asset('storage/' . $dish->img_url) }}" style="object-fit: cover">
                        </div>
                        @endif
                        <div class="admin-card-text-container">
                            <h4 class="card-text">{{ $dish->price }} €</h4>
                            <p class="card-text">{{ substr($dish->description, 0, 40) }}...</p>
                            <p class="card-text">{{ substr($dish->ingredient_list, 0, 20) }}...</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-12 col-lg-6 admin-new-card-container">
                <a href=" {{ route('admin.restaurants.dishes.create', $restaurant->id) }} ">
                    <div class="admin-add-card">
                        <span><i class="fa fa-plus" aria-hidden="true"></i><h4> Crea un nuovo piatto</h4></span>
                    </div>
                </a>
            </div>
        </div>
    </div>


</div>
{{--
    funziona
    <button type="button" class="btn btn-info spacing">
        <a href=" {{ route('admin.restaurants.dishes.index', $restaurant->id) }} ">Visualizza i piatti</a>
</button>
--}}
@endsection
