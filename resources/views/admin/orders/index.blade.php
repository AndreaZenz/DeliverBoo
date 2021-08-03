@extends('layouts.dashboard')

@section('content')

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Date</th>
      <th scope="col">Customer</th>
      <th scope="col">Restaurant</th>
      <th scope="col">Subtotal</th>
    </tr>
  </thead>
  <tbody>
  @foreach($orders as $order)
    <tr>
      <th scope="row">{{ $order->id }}</th>
      <td>{{ $order->created_at }}</td>
      <td>{{ $order->client_name, $order->client_surname }}</td>
      <td>{{ $order->restaurant_id }}</td>
      <td>{{ $order->total_price }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection