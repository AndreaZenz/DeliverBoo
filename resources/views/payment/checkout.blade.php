@section('HeaderScripts')
    <link rel="shortcut icon" type="image/x-icon" href="http://127.0.0.1:8000/img/favicon.png">

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
    {{-- BRAINTREE --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.min.js"></script>
    
@endsection
@section( 'title', 'Transaction Successful' )
@extends('layouts.app')

@section('content')
    <div class="checkout">
    <div class="container-checkout">
        <h1>Transazione avvenuta con successo! <i class="fas fa-check-circle"></i></h1>
        <p>Grazie per aver ordinato con DeliveBoo. <br>
        A breve riceverai il tuo ordine a casa!</p>
        <h6>
          <a href="{{ url('/') }}">Torna alla homepage</a>
        </h6>
      </div>
    </div>
@endsection

@section( 'scripts' )
    <script>
      localStorage.removeItem('tot_price');
      localStorage.removeItem('restaurant_id');
    </script>
@endsection