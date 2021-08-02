@extends('layouts.dashboard')

@section('content')
<div class="admin-main-container">
    <div class="admin-title-row">
        <div class="admin-title-container">
            
            <h1>{{ __('Bentornato ' . Auth::user()->name ) }}</h1>
            <p>I tuoi ristoranti</p>
        </div>
    </div>
    <div class="admin-cards-main">
        @foreach ($restaurants as $restaurant)
        <div class="col-md-12 col-lg-6 admin-card-container">
            <div class="admin-card" style="width: 100%;">
                <div class="card-name-container">
                    <a href=" {{ route('admin.restaurants.show', [$restaurant->id]) }} ">
                        <h4 class="mb-0">{{ $restaurant->name }}</h4>
                    </a>
                    <div class="dropdown">
                        <button class="dropbtn">
                            <i class="fa fa-ellipsis-v text-white" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href=" {{ route('admin.restaurants.edit', $restaurant->id) }} " class="btn btn-warning">Modifica Ristorante</a>
                            <form action=" {{ route('admin.restaurants.destroy', $restaurant->id) }} " method="post" class="delete_form">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Cancella Ristorante" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="admin-card-body-container">
                    @if($restaurant->img_url)
                    <div class="admin-card-img-container admin-restaurant-card-img">
                        <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid" style="object-fit: cover">
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-md-12 col-lg-6 admin-new-card-container">

            <a href=" {{ route('admin.restaurants.dishes.create', $restaurant->id) }} ">
                <div class="admin-add-card">
                    <span><i class="fa fa-plus" aria-hidden="true"></i>
                        <h4> Aggiungi un altro ristorante</h4>
                    </span>
                </div>
            </a>

        </div>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    {{ __('All your restaurants') }}
</div>



<div class="container">
    @foreach ($restaurants as $restaurant)
    <div class="col-12">
        @if($restaurant->img_url)

        <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
        @endif

        <h1>{{$restaurant->name}}</h1>
        <h2>{{$restaurant->address}}</h2>


        @include('partials.deleteBtn', ["restaurant"=> $restaurant])
        @include('partials.modifyBtn')

        <button type="button" class="btn btn-info spacing">
            <a href=" {{ route('admin.restaurants.show', [$restaurant->id]) }} ">Visualizza il tuo ristorante</a>
        </button>


        <a class="btn btn-secondary" href=" {{ route('admin.restaurants.dishes.create', $restaurant->id) }} ">Crea un piatto</a>


    </div>
    @endforeach
</div>
</div>
</div>
</div>
</div> --}}
@endsection



{{-- pulsante create restaurant --}}
{{-- <div class="links">
                    <a href=" {{route('admin.restaurants.create')}} ">Create</a>
</div> --}}
