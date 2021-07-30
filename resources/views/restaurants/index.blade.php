@extends('layouts.app')

@section('content')

<restaurant-index :types='@json($types)'></restaurant-index>

<div class="pink-bg">
    <div class="container">
        <div class="pink-bg-text">
            <h1>La selezione di Deliveroo</h1>
        </div>
    </div>
</div>


@endsection
