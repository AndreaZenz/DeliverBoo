@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="create-edit-container">
        @if($dish->img_url)
        <img src="{{ asset('storage/' . $dish->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
        @endif
        <div class="forms-container">
            <h1>Modifica piatto</h1>

            <form action="{{ route('admin.restaurants.dishes.update', [$dish->restaurant_id, $dish->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">
                        <h5>Nome del piatto</h5>
                    </label>
                    <input value="{{ old('name', $dish->name)}}" type="text" name="name" class="form-input form-control 
            @error('name') is-invalid @enderror" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">
                        <h5>Prezzo</h5>
                    </label>
                    <input type="text" name="price" class="form-input form-control 
            @error('price') is-invalid @enderror" value="{{ old('price', $dish->price) }}">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">
                        <h5>Descrizione</h5>
                    </label>
                    <input type="text" name="description" class="form-input form-control 
            @error('description') is-invalid @enderror" value="{{ old('description', $dish->description) }}">
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ingredient_list">
                        <h5>Ingredienti</h5>
                    </label>
                    <input type="text" name="ingredient_list" class="form-input form-control 
            @error('ingredient_list') is-invalid @enderror" value="{{ old('ingredient_list', $dish->ingredient_list) }}">
                    @error('ingredient_list')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        <h5>Modifica l'immagine del piatto</h5>
                    </label>
                    <input type="file" name="img_url" accept=".jpg,.png" class="form-control-file">
                </div>

                <input type="submit" value="Invia">
            </form>
        </div>
    </div>
</div>
@endsection
