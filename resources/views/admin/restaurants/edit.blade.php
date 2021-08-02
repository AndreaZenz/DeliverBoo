@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="create-edit-container">
        @if($restaurant->img_url)
        <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
        @endif
        <div class="forms-container">
            <h1>Modifica Ristorante</h1>

            <form method="post" action="{{route('admin.restaurants.update' , ['restaurant' => $restaurant->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">
                        <h5>Nome</h5>
                    </label>
                    <input value="{{ old('name', $restaurant->name)}}" type="text" name="name" class="form-input form-control 
            @error('name') is-invalid @enderror" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">
                        <h5>Indirizzo</h5>
                    </label>
                    <input type="text" name="address" class="form-input form-control 
            @error('address') is-invalid @enderror" value="{{ old('address', $restaurant->address) }}">
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        <h5>Modifica l'immagine del Ristorante</h5>
                    </label>
                    <input type="file" name="img_url" accept=".jpg,.png" class="form-control-file">
                </div>

                <div class="form-group">
                    <label>
                        <h5>Seleziona le tipologie del Ristorante</h5>
                    </label><br>

                    @foreach($types as $type)

                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input name="types[]" class="form-check-input" type="checkbox" value="{{ $type->id }}" {{ $restaurant->types->contains($type) ? 'checked' : '' }}>
                            {{ $type->name }}
                        </label>
                    </div>
                    @endforeach
                </div>

                <input type="submit" value="invia">
            </form>
        </div>
    </div>
</div>
@endsection
