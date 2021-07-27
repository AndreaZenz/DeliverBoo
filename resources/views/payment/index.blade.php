<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" type="image/x-icon" href="http://127.0.0.1:8000/img/favicon.png">

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css" integrity="sha512-9iWaz7iMchMkQOKA8K4Qpz6bpQRbhedFJB+MSdmJ5Nf4qIN1+5wOVnzg5BQs/mYH3sKtzY+DOgxiwMz8ZtMCsw==" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- BRAINTREE --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.min.js"></script>
    <title>Shop - Cart</title>
</head>
<body class="payment">


    <main id="app">
        <div class="container">

            @if (session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
            @endif

            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="left">
                <h1>Payment</h1>

                <div class="content">
                    <form id="payment-form" action="{{ route('shop.payment.checkout') }}" method="post">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="name">Name: </label>
                            <input type="text" class="form-control" name="name" placeholder="Write your name" id="name" required>
                        </div>

                        <div class="form-group">
                            <label for="surname">Surname: </label>
                            <input type="text" class="form-control" name="surname" placeholder="Write your surname" id="surname" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address: </label>
                            <input type="text" class="form-control" name="address" placeholder="Write your address" id="address" required>
                        </div>

                        <div class="form-group">
                            <label for="mail">Email: </label>
                            <input type="text" class="form-control" name="email" placeholder="Write your email" id="mail" required>
                        </div>

                        {{-- <label for="mail">Orario di consegna: </label>
                            <input type="time" name="time" id="mail" required> --}}

                        <div class="form-group">
                            <label for="comment">Commento: </label>
                            <textarea class="form-control" id="comment" rows="3" name="comment" rows="5" placeholder="Write a comment"></textarea>
                        </div>

                        <input id="restaurant_id" name="user_id" type="hidden" min="1" :value="restaurant_id" readonly>
                        <input id="plates" name="arrPlates" type="hidden" min="1" :value="plates" readonly>

                        <section>
                            <label for="amount">
                                <div class="input-wrapper amount-wrapper">
                                    <input id="amount" name="amount" type="hidden" min="1" :value="parseFloat(tot_price).toFixed(2)" readonly>
                                    <input id="amount" name="price" type="hidden" min="1" :value="parseFloat(tot_price).toFixed(2)" readonly>
                                </div>
                            </label>

                            <div class="bt-drop-in-wrapper">
                                <div id="bt-dropin"></div>
                            </div>
                        </section>

                        <input id="nonce" name="payment_method_nonce" type="hidden" />

                        <div class="buttons">
                            <button class="button btn btn-primary" type="submit"><span>Acquista</span></button>
                            <a href="{{ url()->previous() }}" class="btn">Torna indietro</a>
                        </div>

                    </form>
                </div>



            </div>

            <div class="right">
                <div class="shop_cart">

                    <div id="shop_cart_top">
                        <p class="title_top">Piatti acquistati: </p>
                        <div v-for="(item, index) in arrItems">
                            <p>@{{ index + 1 }}) @{{ item.name }} x@{{ item.amount }} prezzo: @{{ item.price }}€</p>
                        </div>
                    </div>

                    <div id="shop_cart_bottom">
                        <div id="shop_cart_bottom_delivery">
                            <div>Spese di consegna</div>
                            <div>@{{ parseFloat(delivery).toFixed(2) }}€</div>
                        </div>

                        <div id="shop_cart_bottom_total">
                            <div>Totale</div>
                            <div id="item_plate" class="price_animation">@{{ parseFloat(tot_price).toFixed(2) }}€</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')

    <script src="{{ asset('js/paymentScript.js') }}"></script>

    {{-- SCRIPT BRAINTREE --}}
    
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";
        braintree.dropin.create({
            authorization: client_token
            , selector: '#bt-dropin'
        , }, function(createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    // Add the nonce to the form and submit

                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });

    </script>
</body>
</html>
