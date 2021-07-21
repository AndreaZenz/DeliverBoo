@extends('layouts.app')

@section('content')
<h1>Homepage non loggato</h1>
{{-- Questo div cerca il ristorante --}}
<div class="flex-center position-ref full-height">
    <div class="flex-center position-ref full-height text-center">
        <a class="display-4" href="{{ route("restaurants.index") }}">Cerca ristoranti</a>
    </div>
</div>


{{-- Div che invia alla dashboard --}}

<div class="links">
    <a href=" {{route('admin.home_login')}} ">Vai all'homepage dei loggati</a>
</div>

@endsection
