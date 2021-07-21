@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-12">

    <div class="container">
    @foreach ($restaurants as $restaurant)
    <div class="col-4">
        <h1>{{$restaurant->name}}</h1>
        <h2>{{$restaurant->address}}</h2>
    </div>
    @endforeach
</div>

  </div>
</div>
@endsection
