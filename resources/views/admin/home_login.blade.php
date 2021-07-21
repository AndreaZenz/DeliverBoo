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

                    {{ __('You are logged in!') }}
                </div>

                {{-- pulsante create restaurant --}}
                {{-- <div class="links">
                    <a href=" {{route('admin.restaurants.create')}} ">Create</a>
                </div> --}}

                <div class="container">
                    @foreach ($restaurants as $restaurant)
                    <div class="col-12">
                        <h1>{{$restaurant->name}}</h1>
                        <h2>{{$restaurant->address}}</h2>
                        <a href=" {{ route('admin.restaurants.edit', $restaurant->id) }} ">Modifica</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
