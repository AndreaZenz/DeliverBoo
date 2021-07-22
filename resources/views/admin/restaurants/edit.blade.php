@extends('layouts.dashboard')

@section('content')
<div class="container">

    @if($restaurant->img_url)
    <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
    @endif

    <form method="post" action="{{route('admin.restaurants.update' , ['restaurant' => $restaurant->id])}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf


        <label for="name">Restaurant name</label>
        <textarea class="form-control" type="text" name="name" id="name" value={{ old('name', $restaurant->name) }}>
        {{$restaurant->name}}
        </textarea>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="address">Address</label>
        <textarea class="form-control" type="text" name="address" id="address" value={{ old('name', $restaurant->address) }}>
        {{$restaurant->address}}
        </textarea>
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <div class="form-group">
            <label>modifica l'immagine del tuo ristorante</label>
            <input type="file" name="img_url" accept=".jpg,.png" class="form-control-file">
        </div>

        <input type="submit" value="invia">

        <ul>
            @foreach ($types as $type)
            <li>{{$type->name}}</li>
            @endforeach
        </ul>
    </form>
</div>
@endsection
