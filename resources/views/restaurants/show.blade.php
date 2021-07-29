@extends('layouts.app')

@section('content')

{{-- <restaurant-show
:id = '{{$restaurant->id}}'
>
</restaurant-show> --}}

<rest-showw
:id = '{{$restaurant->id}}'
{{-- :sganciaisordi = "route("payment")" --}}
>
</rest-showw>



{{-- <div v-for='i in 10' :key='i'>
<span v-text="'Text ' + i"></span>
</div> --}}
@endsection