@extends('layouts.dashboard')

@section('content')
<div class="container">

    @if($restaurant->img_url)
    <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
    @endif

    <form method="post" action="{{route('admin.restaurants.update' , ['restaurant' => $restaurant->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Restaurant name</label>
            <input value="{{ old('name', $restaurant->name)}}" type="text" name="name" class="form-control 
            @error('name') is-invalid @enderror" required>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control 
            @error('address') is-invalid @enderror" value="{{ old('address', $restaurant->address) }}">
            @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="form-group">
            <label>modifica l'immagine del tuo ristorante</label>
            <input type="file" name="img_url" accept=".jpg,.png" class="form-control-file">
        </div>

        <a class="display-4" href="{{ route("dishes.create") }}">Aggiungi Piatto al Menù del tuo ristorante</a>
        <br>
        <input type="submit" value="invia">

        <ul>
            @foreach ($types as $type)
            <li>{{$type->name}}</li>
            @endforeach
        </ul>
    </form>
</div>
@endsection
