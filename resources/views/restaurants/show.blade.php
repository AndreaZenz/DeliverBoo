@extends('layouts.app')

@section('content')
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
                                <i class="fas fa-plus-circle" 
                                @click=" AddToCart( {{ $dish->name }}, 
                                {{ $dish->price }}, 
                                {{ $dish->img_url }} ) "></i>
                            </a>
                            <a class="btn-link" href="{{ route()}}"
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </span>
                    </div>
                    @endforeach
                </div>
                <div class="col-4">
                    <a href="{{ route('payment.index') }}">
                        <button type="button" class="btn btn-info spacing">Go To Checkout</button>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/cartScript.js') }}"></script>


@endsection
