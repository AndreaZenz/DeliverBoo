@extends('layouts.app')

@section('content')

<div class="container">
    @if($restaurant->img_url)
    <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
    @endif
    <h1>{{$restaurant->name}}</h1>
    <p>{{$restaurant->address}}</p>
    
    <button type="button" class="btn btn-info spacing">
        {{-- <a href=" {{ route('admin.dishes.index') }} ">Visualizza i piatti</a> --}}
        <a href=" {{ url('admin/dishes/'. $restaurant->id) }} ">Visualizza i piatti</a>
        {{-- <a href=" {{ url('admin/restaurant/'. $restaurant->id . '/dishes', ) }} ">Visualizza i piatti</a> --}}
    </button>
    
</div>

@endsection
