@extends('layouts.app')

@section('content')

<restaurant-index :types='@json($types)'></restaurant-index>

<div class="pink-bg">
    <div class="container">
        <div class="pink-bg-text">
            <h1>La selezione di Deliveroo</h1>
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


@endsection
