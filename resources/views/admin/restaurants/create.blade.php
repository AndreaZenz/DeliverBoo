@extends('layouts.dashboard')

@section('content')
<div class="container">
    <form action=" {{ route('admin.restaurants.store') }} " method="post">
        @csrf
        <label for="name">Restaurant name</label>
        <input type="text" name="name" id="name">
        <label for="address">Address</label>
        <input type="text" name="address" id="address">
        <label for="img_url">Img</label>
        <input type="text" name="img_url" id="img_url">
        <input type="submit" value="invia">
        <ul>
            @foreach ($types as $type)
                <li>{{$type->name}}</li>
            @endforeach
        </ul>
    </form>
</div>
@endsection
