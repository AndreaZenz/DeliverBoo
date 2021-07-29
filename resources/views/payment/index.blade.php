@extends('layouts.app')

@section('content')
<div class="payment">
    <main id="app">
        <div class="container mb-4">

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

            <div class="row">

                <div class="left col-8">
                    <h1>Payment</h1>

                    <div class="content">
                        <form id="payment-form" action="{{ route('payment.checkout') }}" method="post">
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

                            <input id="restaurant_id" name="client_name" type="hidden" min="1" :value="restaurant_id" readonly>

                            <section>
                                <label for="amount">
                                    <div class="input-wrapper amount-wrapper">
                                        <input id="amount" name="amount" type="hidden" min="1" :value="parseFloat(prezzototale).toFixed(2)" readonly>
                                        <input id="amount" name="price" type="hidden" min="1" :value="parseFloat(prezzototale).toFixed(2)" readonly>
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

                <div class="right col-4">
                    <div class="shop_cart mt-5">

                        {{-- <div id="shop_cart_top">
                            <p class="title_top">Piatti acquistati: </p>
                            <div v-for="(item, index) in arrItems">
                                <p>@{{ index + 1 }}) @{{ item.name }} x@{{ item.amount }} prezzo: @{{ item.price }}€</p>
                    </div>
                </div> --}}

                <div id="shop_cart_bottom">

                    <div id="shop_cart_bottom_total">
                        <div>Totale</div>
                        <div id="item_plate" class="price_animation">@{{ parseFloat(prezzototale).toFixed(2) }}€</div>
                    </div>
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
</div>
@endsection