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
        <div class="form-group">
            <label>Tipologia di ristorante</label><br>

            @foreach($types as $type)

            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input name="types[]" class="form-check-input" type="checkbox" value="{{ $type->id }}">
                    {{ $type->name }}
                </label>
            </div>
            @endforeach
        </div>
        <input type="submit" value="invia">
    </form>
</div>
@endsection
