@extends('layouts.dashboard')

@section('content')
<div class="container">
    <form action=" {{ route('admin.restaurants.dishes.store', $restaurant_id) }}" method="POST" enctype="multipart/form-data">
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
    </form>
</div>
@endsection
