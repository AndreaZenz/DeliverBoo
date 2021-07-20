@extends('layouts.app')

@section('content')

<div class="container" style= "color: red">
    <h1>benvenuto su Deliverboo</h1>
</div>

<div class="container">
    @foreach ($restaurants as $restaurant)
    <div class="col-4">
        <h1>{{$restaurant->name}}</h1>
        <h2>{{$restaurant->address}}</h2>
    </div>
    @endforeach
</div>

@endsection
