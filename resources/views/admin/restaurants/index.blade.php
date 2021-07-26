@extends('layouts.dashboard')

@section('content')
<div class="container">
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

                {{-- pulsante create restaurant --}}
                {{-- <div class="links">
                    <a href=" {{route('admin.restaurants.create')}} ">Create</a>
            </div> --}}

            <div class="container">
                @foreach ($restaurants as $restaurant)
                <div class="col-12">
                    <div class="card mg-top-bot-10" style="width: 100%;">
                        @if($restaurant->img_url)

                        <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid card-img-top" style="width: 100%; max-height: 150px; object-fit: cover">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$restaurant->name}}</h5>
                            <p class="card-text">{{$restaurant->address}}</p>
                            @include('partials.deleteBtn', ["restaurant"=> $restaurant])
                            @include('partials.modifyBtn') <br>
                            @include('partials.showBtn') <br>
                            <a class="btn btn-secondary spacing" href=" {{ route('admin.restaurants.dishes.create', $restaurant->id) }} ">Crea un piatto</a>
                            <a href=" {{ route('admin.restaurants.dishes.index', [$restaurant->id]) }} " class="btn mg-top-bot-10 btn-primary">Visualizza i piatti</a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection
