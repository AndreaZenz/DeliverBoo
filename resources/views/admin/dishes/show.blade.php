@extends('layouts.dashboard')

@section('content')

<div class="container">
    @if($dish->img_url)
    <img src="{{ asset('storage/' . $dish->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
    @endif
    <h1>{{ $dish->name }}</h1>
    <h2>{{ $dish->price }}</h2>
    <h2>{{ $dish->description }}</h2>
    <h2>{{ $dish->ingredient_list }}</h2>
</div>

@endsection
