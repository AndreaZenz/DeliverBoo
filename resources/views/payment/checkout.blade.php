<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" type="image/x-icon" href="http://127.0.0.1:8000/img/favicon.png">

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />
    {{-- /fontawesome --}}

    {{-- favicon --}}
    <link rel="shortcut icon" type="image/x-icon"href="img/favicon.png">

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <title>Transazione - Successo</title>
  </head>
  <body class="checkout">

    @include('partials.header')
    
    <main>
      <div class="container">
        <h1>Transazione avvenuta con successo!</h1>
        <img src="{{ asset('img/pagamento.png') }}" alt="">
        <a href="{{ url('/') }}">Torna alla homepage</a>
      </div>
    </main>

    @include('partials.footer')

    <script>
      localStorage.removeItem('tot_price');
      localStorage.removeItem('delivery');
      localStorage.removeItem('plates');
      localStorage.removeItem('restaurant_id');
    </script>
    
  </body>
</html>