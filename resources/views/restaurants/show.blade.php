@extends('layouts.app')

@section('content')

{{-- <restaurant-show
:id = '{{$restaurant->id}}'
>
</restaurant-show> --}}

<restaurant-show
:id = '{{$restaurant->id}}'
{{-- :sganciaisordi = "route("payment")" --}}
>
</restaurant-show>



{{-- <div v-for='i in 10' :key='i'>
<span v-text="'Text ' + i"></span>
</div> --}}
@endsection