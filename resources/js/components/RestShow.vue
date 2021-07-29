<template>
  <div>
    <div class="container">
      <div class="ristorante-hero card">
        <div class="row flex-column">
          <img
            :src="ristorante.img_url"
            alt="daje lazio"
            class="img-fluid"
            style="width: 100%; max-height: 150px; object-fit: cover"
          />
          <h1>{{ ristorante.name }}</h1>
          <h3>{{ ristorante.address }}</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-8 pr-1">
          <div class="row">
            <dish-card
              v-for="dish in dishList"
              :key="dish.id"
              :name="dish.name"
              :img-url="dish.img_url"
              :title="dish.title"
              :price="dish.price"
              :ingredients="dish.ingredients_list"
              :description="dish.description"
              :link="dish.link"
            ></dish-card>
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
  name: "RestShow",
  props: {
    id: Number,
  },
  data() {
    return {
      allDishList: [],
      dishList: [],
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
        this.dishList = resp.data.results.dishes;
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


