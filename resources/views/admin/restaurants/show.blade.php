@extends('layouts.app')

@section('content')

<div class="container">
    @if($restaurant->img_url)
    <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
    @endif
    <h1>{{$restaurant->name}}</h1>
    <p>{{$restaurant->address}}</p>
    <a class="btn btn-primary mg-top-bot-10" href=" {{ route('admin.dishes.create', $restaurant->id) }} ">Crea un piatto</a>
</div>

@endsection
