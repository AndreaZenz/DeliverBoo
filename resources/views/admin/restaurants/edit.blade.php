@extends('layouts.dashboard')

@section('content')
<div class="container">
    <form action=" {{ route('admin.restaurants.store') }} " method="post">
        @csrf
        @method('PUT')

        <label for="name">Restaurant name</label>
        <textarea class="form-control" type="text" name="name" id="name" value={{ old('name', $restaurant->name) }}>
        {{$restaurant->name}} 
        </textarea>

        <label for="address">Address</label>
        <textarea class="form-control" type="text" name="address" id="address" value={{ old('name', $restaurant->address) }}>
        {{$restaurant->address}}
        </textarea>

        <label for="img_url">Img</label>
        <textarea class="form-control" type="text" name="img_url" id="img_url" value={{ old('name', $restaurant->img_url) }}>
            {{$restaurant->img_url}}
        </textarea>

        <input type="submit" value="invia">

        <ul>
            @foreach ($types as $type)
                <li>{{$type->name}}</li>
            @endforeach
        </ul>
    </form>
</div>
@endsection
