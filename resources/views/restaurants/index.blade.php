@extends('layouts.app')

@section('content')

<restaurant-index></restaurant-index>

{{-- <div class="row justify-content-center">
    <div class="col-12">

        <div class="container">

            @foreach ($restaurants as $restaurant)

            <restaurant-card 
            img-url="{{ $restaurant->img_url ? asset('storage/' . $restaurant->img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png'}}"
            name="{{ $restaurant->name }}" 
            address="{{ $restaurant->address }}"
            ></restaurant-card>

            @endforeach
        </div>

    </div>
</div> --}}
@endsection
