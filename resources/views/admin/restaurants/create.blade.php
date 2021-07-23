@extends('layouts.dashboard')

@section('content')
<div class="container">
    <form action=" {{ route('admin.restaurants.store') }} " method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Restaurant name</label>
        <input type="text" name="name" id="name">
        <label for="address">Address</label>
        <input type="text" name="address" id="address">
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
