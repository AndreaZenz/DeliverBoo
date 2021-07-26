@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="width: 100%;">
        <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
        <div class="card-body">
            <h5 class="card-title">{{$restaurant->name}}</h5>
            <p class="card-text">{{$restaurant->address}}</p>
            <a href=" {{ route('dishes.index') }} " class="btn btn-primary">Visualizza i piatti</a>
        </div>
    </div>
</div>
@endsection
