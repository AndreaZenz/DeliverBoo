@extends('layouts.dashboard')

@section('content')
<div class="container">

    @if($dish->img_url)
    <img src="{{ asset('storage/' . $dish->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
    @endif

    <form method="post" action="{{route('admin.dishes.update' , ['dish' => $dish->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">dish name</label>
            <input value="{{ old('name', $dish->name)}}" type="text" name="name" class="form-control 
            @error('name') is-invalid @enderror" required>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">description</label>
            <input type="text" name="description" class="form-control 
            @error('description') is-invalid @enderror" value="{{ old('description', $dish->description) }}">
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="form-group">
            <label>modifica l'immagine del tuo piatto</label>
            <input type="file" name="img_url" accept=".jpg,.png" class="form-control-file">
        </div>


        <div class="form-group">
            <label for="description">description</label>
            <input type="text" name="description" class="form-control 
            @error('description') is-invalid @enderror" value="{{ old('description', $dish->description) }}">
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">price</label>
            <input type="text" name="price" class="form-control 
            @error('price') is-invalid @enderror" value="{{ old('price', $dish->price) }}">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <input type="checkbox" name="visible" id="visible">
        
        <input type="submit" value="invia">

    </form>
</div>
@endsection