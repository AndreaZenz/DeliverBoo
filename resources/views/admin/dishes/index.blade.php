@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('all your dishes') }}
                </div>

                {{-- pulsante create restaurant --}}
                {{-- <div class="links">
                    <a href=" {{route('admin.restaurants.create')}} ">Create</a>
            </div> --}}

            <div class="container">
                @foreach ($dishes as $dish)
                    <div class="col-12">
                        @if($dish->img_url)
                        <img src="{{ asset('storage/' . $dish->img_url) }}" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover">
                        @endif

                        <h1>{{ $dish->name }}</h1>
                        <h2>{{ $dish->price }}</h2>
                        <h2>{{ $dish->description }}</h2>
                        <h2>{{ $dish->ingredient_list }}</h2>
                        <a href=" {{ route('admin.restaurants.dishes.edit', [$dish->restaurants_id, $dish->id]) }} ">Modifica</a>

                        <form action=" {{ route('admin.restaurants.dishes.destroy', [$dish->restaurants_id, $dish->id]) }} " method="POST" class="delete_form">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Cancella" class="btn btn-danger spacing">
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection
