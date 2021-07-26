@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('All the dishes') }}
                </div>
            <div class="container">
                @foreach ($dishes as $dish)
                <div class="col-12">
                    <div class="card mg-top-bot-10" style="width: 100%;">
                        @if($dish->img_url)
                        <img src="{{ asset('storage/' . $dish->img_url) }}" class="img-fluid card-img-top" style="width: 100%; max-height: 150px; object-fit: cover">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->name }}</h5>
                            <h4 class="card-text">{{ $dish->price }}</h4>
                            <p class="card-text">{{ $dish->description }}</p>
                            <p class="card-text">{{ $dish->ingredient_list }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> --}}
</div>
@endsection