@extends('layouts.dashboard')

@section('content')
<div class="container">

    @if($dish->img_url)
    <img src="{{ asset('storage/' . $dish->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
    @endif

    <form method="POST" action="{{ route('admin.restaurants.dishes.update' , [$dish->restaurants_id, $dish->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Dish name</label>
            <input value="{{ old('name', $dish->name)}}" type="text" name="name" class="form-control 
            @error('name') is-invalid @enderror" required>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control 
            @error('price') is-invalid @enderror" value="{{ old('price', $dish->price) }}">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control 
            @error('description') is-invalid @enderror" value="{{ old('description', $dish->description) }}">
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ingredient_list">Ingredients list</label>
            <input type="text" name="ingredient_list" class="form-control 
            @error('ingredient_list') is-invalid @enderror" value="{{ old('ingredient_list', $dish->ingredient_list) }}">
            @error('ingredient_list')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>modifica l'immagine del tuo menù</label>
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
