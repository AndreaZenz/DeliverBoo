<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-8 pr-1">
          <div class="row flex-column">
            <img
              :src="ristorante.img_url"
              alt="daje lazio"
              class="img-thumbnail"
            />
            <h1>nome ristorante: {{ ristorante.name }}</h1>
            <h2>{{ ristorante.address }}</h2>
          </div>
          <div class="row">
            <div
              class="card mg-top-bot-10 col-4"
              v-for="(dish, index) in dishes"
              :key="dish.id"
            >
              <img
                :src="dish.img_url"
                class="img-fluid card-img-top"
                style="width: 100%; max-height: 150px; object-fit: cover"
                alt=""
              />
              <div class="card-body">
                <h5 class="card-title">Name: {{ dish.name }}</h5>
                <h5 class="card-title">Prezzo: {{ dish.price }}</h5>
                <h5 class="card-title">Descrizione: {{ dish.description }}</h5>
                <h5 class="card-title">Ingredienti: {{ dish.ingredients }}</h5>
                <button class="btn btn-primary" @click="increse(index)">
                  +
                </button>
                <button class="btn btn-primary" @click="decrese(index)">
                  -
                </button>
                <br />
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <h1>Carrello</h1>
          <div v-for="(item, index) in cart" :key="index">
            <!-- aggiunta del piatto -->
          </div>
          <div class="div">Somma: {{ prezzototale }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "RestaurantShow",
  props: {
    id: Number,
  },
  data() {
    return {
      ristorante: {},
      dishes: [],
      id: this.id,
      cart: [],
      prezzototale: 0,
    };
  },
  methods: {
    increse(i) {
      this.cart.push(this.dishes[i].price);
      
      this.prezzototale += parseFloat(this.dishes[i].price);
    },

    decrese(i) {
      const index = this.cart.indexOf(this.dishes[i].price);
      if (index > -1) {
        this.cart.splice(index, 1);
      }
      if (this.prezzototale > 0) {
        this.prezzototale -= parseFloat(this.dishes[i].price);
      }
    },
  },
  mounted() {
    axios
      .get("/api/restaurant/" + this.id)
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


