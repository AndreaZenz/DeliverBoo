@extends('layouts.app')

@section('content')

<restaurant-index :types='@json($types)'></restaurant-index>


@endsection
