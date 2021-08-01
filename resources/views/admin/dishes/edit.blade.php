@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="edit-dishes-container">
        @if($dish->img_url)
        <img src="{{ asset('storage/' . $dish->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
        @endif
        <div class="forms-container">
            <form action="{{ route('admin.restaurants.dishes.update', [$dish->restaurant_id, $dish->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">
                        <h4>Nome del piatto</h4>
                    </label>
                    <input value="{{ old('name', $dish->name)}}" type="text" name="name" class="form-control 
            @error('name') is-invalid @enderror" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">
                        <h4>Prezzo</h4>
                    </label>
                    <input type="text" name="price" class="form-control 
            @error('price') is-invalid @enderror" value="{{ old('price', $dish->price) }}">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">
                        <h4>Descrizione</h4>
                    </label>
                    <input type="text" name="description" class="form-control 
            @error('description') is-invalid @enderror" value="{{ old('description', $dish->description) }}">
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ingredient_list">
                        <h4>Ingredienti</h4>
                    </label>
                    <input type="text" name="ingredient_list" class="form-control 
            @error('ingredient_list') is-invalid @enderror" value="{{ old('ingredient_list', $dish->ingredient_list) }}">
                    @error('ingredient_list')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        <h4>Modifica l'immagine del piatto</h4>
                    </label>
                    <input type="file" name="img_url" accept=".jpg,.png" class="form-control-file">
                </div>

                <input type="submit" value="Invia">
            </form>
        </div>
    </div>
</div>
@endsection
