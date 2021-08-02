@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="create-edit-dishes-container">
        <div class="forms-container">
            <h1>Crea un nuovo piatto</h1>

            <form action=" {{ route('admin.restaurants.dishes.store', $restaurant_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">
                        <h5>Nome del piatto</h5>
                    </label>
                    <input type="text" name="name" class="form-control 
            @error('name') is-invalid @enderror" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">
                        <h5>Prezzo</h5>
                    </label>
                    <input type="text" name="price" class="form-control 
            @error('price') is-invalid @enderror">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">
                        <h5>Descrizione</h5>
                    </label>
                    <input type="text" name="description" class="form-control 
            @error('description') is-invalid @enderror">
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ingredient_list">
                        <h5>Ingredienti</h5>
                    </label>
                    <input type="text" name="ingredient_list" class="form-control 
            @error('ingredient_list') is-invalid @enderror">
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
    {{-- <form action=" {{ route('admin.restaurants.dishes.store', $restaurant_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Dish name</label>
    <input type="text" name="name" id="name">
    <label for="price">Price</label>
    <input type="text" name="price" id="price">
    <label for="description">Description</label>
    <input type="text" name="description" id="description">
    <label for="ingredient_list">Ingredients list</label>
    <input type="text" name="ingredient_list" id="ingredient_list">
    <div class="form-group">
        <label>Aggiungi un immagine del tuo ristorante</label>
        <input type="file" name="img_url" accept=".jpg,.png" class="form-control-file">
    </div>

    <input type="submit" value="invia">
    <ul>
        @foreach ($types as $type)
        <li>{{$type->name}}</li>
        @endforeach
    </ul>
    </form> --}}
</div>
@endsection
