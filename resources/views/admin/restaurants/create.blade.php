@extends('layouts.dashboard')

@section('content')
{{-- <div class="container"> --}}
<div class="col-md-12 create-edit-container create-edit-restaurant-container">
    <div class="col-lg-6 forms-container restaurant-forms-container">
        <h1 class="col-12 diventa-partner">Diventa subito partner di Deliveroo, dai spazio alle tue attività</h1>
        <h1 class="">Crea Ristorante</h1>
        <form method="post" action="  {{ route('admin.restaurants.store') }}  " enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">
                    <h5>Nome</h5>
                </label>
                <input type="text" name="name" class="col-lg-12 col-md-9 form-input form-control" id="name" placeholder="Nome del tuo ristorante" aria-label="Nome del tuo ristorante" aria-describedby="basic-addon1">
            </div>

            <div class="form-group">
                <label for="address">
                    <h5>Indirizzo</h5>
                </label>
                <input type="text" name="address" id="address" class="col-lg-12 col-md-9 form-input form-control" placeholder="Via del tuo ristorante" aria-label="Via del tuo ristorante" aria-describedby="basic-addon1">
            </div>

            <div class="col-9 form-group">
                <label>
                    <h5>Imposta l'immagine del Ristorante</h5>
                </label>
                {{-- <input type="file" name="img_url" accept=".jpg,.png" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label> --}}

                <input type="file" name="img_url" accept=".jpg,.png" class="form-control-file">
            </div>

            <div class="form-group">
                <label>
                    <h5>Seleziona le tipologie del Ristorante</h5>
                </label><br>

                @foreach($types as $type)

                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <div class="input-text restaurant-inputs">
                            <input name="types[]" class="form-check-input" type="checkbox" value="{{ $type->id }}">
                            {{ $type->name }}
                        </div>
                    </label>
                </div>
                @endforeach
            </div>
            <input type="submit" value="invia">
        </form>
        <div class="create-restaurant-bg-img">
            <img src="{{url('/img/restaurant_create/c128b50ee4b2b661df815ad413c84ec5.png')}}" alt="chef">
        </div>
    </div>
</div>
{{-- <div class="spacier-top">
        <div class="row">
            <div class="col-8">
                <div class="create-text">
                    <h1>Diventa subito partner di Deliveroo, dai spazio alle tue attività</h1>
                    <small class="gray-text">Aumenta le tue vendite fino al 30% grazie alle consegne a domicilio</small>
                </div>
                <form action=" {{ route('admin.restaurants.store') }} " method="post" enctype="multipart/form-data" class="spacier-24">
@csrf
<div class="input-group mb-3">
    <input type="text" name="name" class="form-control" id="name" placeholder="Nome del tuo ristorante" aria-label="Nome del tuo ristorante" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
    <input type="text" name="address" id="address" class="form-control" placeholder="Via del tuo ristorante" aria-label="Via del tuo ristorante" aria-describedby="basic-addon1">

</div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Aggiungi un immagine del tuo ristorante</span>
    </div>
    <div class="custom-file">
        <input type="file" name="img_url" accept=".jpg,.png" class="custom-file-input" id="inputGroupFile01">
        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
    </div>
</div>
<div class="form-group">
    <h5 class="gray-text">Scegli la tipologia di ristorante</h5><br>
    @foreach($types as $type)
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            <div class="input-text">
                <input name="types[]" class="form-check-input" type="checkbox" value="{{ $type->id }}">
                {{ $type->name }}
            </div>
        </label>
    </div>
    @endforeach
</div>
<button class="btn btn-primary" type="submit" value="invia">
    Invia
</button>
</form>
</div>
<div class="volavola">
    <img src="{{url('/img/restaurant_create/c128b50ee4b2b661df815ad413c84ec5.png')}}" alt="chef">
</div>
</div>
</div> --}}
{{-- </div> --}}
@endsection
