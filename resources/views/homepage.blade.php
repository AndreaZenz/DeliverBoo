@extends('layouts.app')

@section('content')
{{-- Questo div cerca il ristorante --}}

<div class="flex-center position-ref full-height">
    <div class="flex-center position-ref full-height text-center">
        <a class="display-4" href="{{ route("restaurants.index") }}">Cerca ristoranti</a>
    </div>
</div>

@endsection
