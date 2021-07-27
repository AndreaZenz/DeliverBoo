@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="width: 100%;">
        <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
        <div class="card-body">
            <h5 class="card-title">{{$restaurant->name}}</h5>
            <p class="card-text">{{$restaurant->address}}</p>
            
        </div>
        <div class="container">
            @foreach ($dishes as $dish)
            <img src="{{ asset('storage/' . $dish->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
            <div class="card-body">
                <h5 class="card-title">{{$dish->name}}</h5>
                <p class="card-text">{{$dish->description}}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
