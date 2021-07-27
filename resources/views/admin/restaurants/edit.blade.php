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

        <div class="form-group">
            <label>Tipologia di ristorante</label><br>

            @foreach($types as $type)

            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input name="types[]" class="form-check-input" type="checkbox" value="{{ $type->id }}" {{ $restaurant->Type->contains($type) ? 'checked' : '' }}>
                    {{ $type->name }}
                </label>
            </div>
            @endforeach
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
