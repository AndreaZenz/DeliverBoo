<template>
  <div>
    <div class="container">

      <div class="ristorante-hero card-my">
        <div class="description-public">

          <h1>{{ ristorante.name }}</h1>
          <h4>{{ ristorante.address }}</h4>
          <div class="vote">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <span>4.0    (1042 recensioni)</span>
            <span id="demo" @onload="random"></span>
          </div>

          <!-- tags -->
          

        <p>Ordina il tuo piatto preferito a casa tua da <strong>{{ ristorante.name }} </strong> grazie alla consegna a domicilio di DeliveBoo.</p>
          <div class="sale">
            <h6>Ordinando in questo ristorante avrai diritto alla consegna gratuita!</h6>
          </div>

        </div>

        <div class="row-my flex-column">
          <img
            :src="ristorante.img_url"
            alt="restaurant image"
            class="img-fluid img-rest"
            style="width: 100%; max-height: 200px; object-fit: cover"
          />

        </div>
      </div>

      <!--  Piatti  -->
      <div class="row-menu-bg bg-menu">
        <div class="col-md-8 col-sm-12">
          <div class="row-menu">

            <!-- DISH CARD -->
            <div
              class="card mg-top-bot-10 col-6"
              v-for="(dish, index) in dishes"
              :key="dish.id"
            >
              <img
                :src="dish.img_url"
                class="img-fluid card-img-top"
                style="width: 100%; height: 150px; object-fit: cover"
                alt=""
              />

              <div class="card-body">
                <h5 class="card-title">Name: {{ dish.name }}</h5>
                <h5 class="card-title">Prezzo: {{ dish.price }} €</h5>
                <h5 class="card-title">Descrizione: {{ dish.description }}</h5>
                <h5 class="card-title">Ingredienti: {{ dish.ingredients }}</h5>
                <button class="btn btn-primary" @click="increase(index)">
                  +
                </button>
                <button class="btn btn-primary" @click="decrease(index)">
                  -
                </button>
                <br />
              </div>
            </div>
            <!-- END DISH CARD -->

          </div>
        </div>

        <!-- CARRELLO -->
        <div class="card-cart col-md-4 col-sm-7 mg-top-bot-10" style="width: 18rem" v-if="cart.length > 0">
          <div class="card-header">Il Tuo Carrello</div>
          <ul class="list-group list-group-flush">
            <li
              v-for="(item, index) in cart"
              :key="index"
              class="list-group-item"
            >
              <span>{{ item.quantity }}</span>
              <span>{{ item.name }}</span>
              <span>{{ item.price }} €</span>
            </li>
            <li class="list-group-item"> <strong> Prezzo Totale : </strong> <br> {{ prezzototale.toFixed(2)}} € </li>
          </ul>
          <a href="/payment">
            <button
              type="button"
              class="btn btn-info spacing" @click="save">
              Go To Checkout
            </button>
          </a>
        </div>
        <!-- END CARRELLO -->

      </div>

    </div>
  </div>
</template>


<script>
export default {
  name: "RestaurantShow",
  props: {
    id: Number,
    // sganciaisordi: String,
  },
  data() {
    return {
      ristorante: {},
      dishes: [],
      restID: this.id,
      cart: [],
      prezzototale: 0,
      allDishQuantity: [],
    };
  },
  methods: {


    random(){
       Math.floor(Math.random() * 2000) + 1;
      //  document.getElementById("demo").innerHTML
    },

    increase(i) {
      const checkPresenza = this.cart.indexOf(this.dishes[i]);

      ////if non c'e' gia' nel carrello
      if (checkPresenza === -1) {
        this.dishes[i].quantity = 1;
        this.cart.push(this.dishes[i]);
      } else {
        this.dishes[i].quantity++;
      }

      this.prezzototale += parseFloat(this.dishes[i].price);

      localStorage.setItem('prezzototale', this.prezzototale);
      localStorage.setItem('plates', JSON.stringify(this.dishes));
      localStorage.setItem('restaurant_id', this.restID);
    },

    decrease(i) {
      const checkPresenza = this.cart.indexOf(this.dishes[i]);
      if (checkPresenza > -1 && this.dishes[i].quantity === 1) {
        //deleta il primo dish corrispondente dal carrello, partendo da this.cart[0]
        this.cart.splice(checkPresenza, 1);

        if (this.dishes[i].quantity)
          this.prezzototale -= parseFloat(this.dishes[i].price).toFixed(2);
      } else if (this.dishes[i].quantity > 1) {
        this.dishes[i].quantity--;

        if (this.dishes[i].quantity)
          this.prezzototale -= parseFloat(this.dishes[i].price).toFixed(2);
      }

      localStorage.setItem('prezzototale', this.prezzototale);
      localStorage.setItem('plates', JSON.stringify(this.dishes));
      localStorage.setItem('restaurant_id', this.restID);
    },
    save: function () {
      localStorage.setItem('prezzototale', this.prezzototale);
      localStorage.setItem('plates', JSON.stringify(this.dishes));
      localStorage.setItem('restaurant_id', this.restID);
      }
  },
  mounted() {
    axios
      .get("/api/restaurant/" + this.restID)
      .then((resp) => {
        this.ristorante = resp.data.results.restaurant;
        this.dishes = resp.data.results.dishes;
      })
      .catch((er) => {
        alert("lato restaurantShow api call(all'interno del vue)");
      });
  },
};
// faccio una chiamata API e gli passo questo ID e lo salvo dentro una variabile nel return dei data dentro L?API controller all'interno della funzione faccio $restaurant::Restaurant->find($id)->with()
// return->json{
//    "r"
//}
</script>


