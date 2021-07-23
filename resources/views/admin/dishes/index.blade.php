@extends('layouts.dashboard')

@section('content')

<div class="container">
                @foreach ($dishes as $dish)
                <div class="col-12">
                    @if($dish->img_url)
                        <img src="{{ asset('storage/' . $restaurant->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
                    @endif
                       <h1>{{$dish->name}}</h1>
                    <h2>{{$dish->description}}</h2>
                    <h2>{{$dish->ingredient_list}}</h2>
                    <h2>{{$dish->price}}</h2>
                    <h2>{{$dish->visible}}</h2>

                    <a href=" {{ route('admin.dish.edit', $dish->restaurant_id) }} ">Modifica</a>

                    @include('partials.deleteBtn', ["dish"=>$dish])

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>

@endsection