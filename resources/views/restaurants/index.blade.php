@extends('layouts.app')

@section('content')

<restaurant-index :types='@json($types)'></restaurant-index>

<div class="white-bg">
    <div class="container">
        <div class="white-bg-text">
            <h1>La selezione di Deliveboo</h1>
        </div>
        <div class="home-page-container">
            <div class="row evenly">
                <div class="col-4 burgher">
                    <div class="food-text">
                        <h1>Dolci e dessert</h1>
                    </div>
                </div>

                <div class="col-6 fruits">
                    <div class="food-text">
                        <h1>comfort food</h1>
                    </div>
                </div>
            </div>
            <div class="row evenly">
                <div class="col-4">
                    <div class="text-link">
                        <p>
                            I grandi classici che scaldano il cuore, perfetti in ogni momento.
                            <br>
                            <a href="#">Scopri Comfort Food</a>
                        </p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-link">
                        <p>
                            Dolci piaceri per rendere la giornata ancora piu gustosa
                            <br>
                            <a href="#">Scopri Dolci e dessert</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row evenly">
                <div class="col-6 vegetable">
                    <div class="food-text">
                        <h1>Perfetti da condividere</h1>
                    </div>
                </div>

                <div class="col-4 ravioli">
                    <div class="food-text">
                        <h1>Esclusiva Deliveboo</h1>
                    </div>
                </div>
            </div>
            <div class="row evenly">
                <div class="col-6">
                    <div class="text-link">
                        <p>
                            Serve una scusa per stare insieme? Ordina dai ristoranti che trasformeranno la tua serata in una vera festa.
                            <br>
                            <a href="#">Scopri Perfetti da condividere</a>
                        </p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-link">
                        <p>
                            I più famosi, i più buoni, i preferiti. Quelli che trovi solo su DeliveBoo
                            <br>
                            <a href="#">Scopri Esclusiva Deliveroo</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pink-bg">
    <div class="container">
        <div class="white-bg-text">
            <h1>I ristoranti piu votati del mese su DeliveBoo</h1>
        </div>
        <div class="row">
            <div class="col-4">
                <p class="best-text">La nostra miglior pizzeria</p>
                <div class="card mg-top-bot-10">
                    <img src="{{ asset('../img/restaurants/Seu.jpg') }}" class="img-fluid card-img-top" style="width: 100%; height: 125px; object-fit: cover" alt="" />
                    <div class="card-body">
                        <h5 class="card-title">
                            Seu pizza illuminati
                        </h5>
                        <small>
                            <strong>Via della magliana </strong>
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <p class="best-text">Il nostro miglior ristorante</p>
                <div class="card mg-top-bot-10">
                    <img src="{{ asset('../img/restaurants/palmira.jpg') }}" class="img-fluid card-img-top" style="width: 100%; height: 125px; object-fit: cover" alt="" />
                    <div class="card-body">
                        <h5 class="card-title">
                            Palmira
                        </h5>
                        <small>
                            <strong>Via abate ugone </strong>
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <p class="best-text">La nostra miglior pasticceria</p>
                <div class="card mg-top-bot-10">
                    <img src="{{ asset('../img/restaurants/bislakko.jpeg') }}" class="img-fluid card-img-top" style="width: 100%; height: 125px; object-fit: cover" alt="" />
                    <div class="card-body">
                        <h5 class="card-title">
                            Bislakko
                        </h5>
                        <small>
                            <strong>Via delle tortine</strong>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="container">
        <div class="row centerme">
            <div class="white-bg-text spazio">
                <h1>Alcuni dei piatti piu ordinati nel mese</h1>
            </div>
            <div class="col-2">
                <img class="piatti-img" src="{{ asset('../img/dishes/pizza.jpg') }}" alt="">
            </div>
            <div class="col-2">
                <img class="piatti-img" src="{{ asset('../img/dishes/amatriciana.jpeg') }}" alt="">
            </div>
            <div class="col-2">
                <img class="piatti-img" src="{{ asset('../img/dishes/chilicb.jpeg') }}" alt="">
            </div>
            <div class="col-2">
                <img class="piatti-img" src="{{ asset('../img/dishes/double_cheese_burger_kfc.jpeg') }}" alt="">
            </div>
            <div class="col-2">
                <img class="piatti-img" src="{{ asset('../img/dishes/green-curry.jpeg') }}" alt="">
            </div>
            <div class="col-2">
                <img class="piatti-img" src="{{ asset('../img/dishes/Noodles.jpeg') }}" alt="">
            </div>
            <div class="col-2">
                <img class="piatti-img" src="{{ asset('../img/dishes/Pad-thai.png') }}" alt="">
            </div>
            <div class="col-2">
                <img class="piatti-img" src="{{ asset('../img/dishes/ramen.jpeg') }}" alt="">
            </div>
            <div class="col-2">
                <img class="piatti-img" src="{{ asset('../img/dishes/uramaki.jpeg') }}" alt="">
            </div>
            <div class="col-2">
                <img class="piatti-img" src="{{ asset('../img/dishes/Yuxiangqiezi.jpeg') }}" alt="">
            </div>
            <div class="col-2">
                <img class="piatti-img" src="{{ asset('../img/dishes/t-bone-frisona.jpeg') }}" alt="">
            </div>
            <div class="col-2">
                <img class="piatti-img" src="{{ asset('../img/dishes/Sha-Zhu-Cai.jpeg') }}" alt="">
            </div>
        </div>
    </div>
</div>


@endsection
