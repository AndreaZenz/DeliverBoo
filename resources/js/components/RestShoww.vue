<template>
  <div>
    <div class="container">
      <div class="ristorante-hero card-my">
        <div class="description-public">

          <h1>{{ ristorante.name }}</h1>
          <h3>{{ ristorante.address }}</h3>
          <div class="vote">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <span>4.0    (1042 recensioni)</span>
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
            style="width: 100%; max-height: 150px; object-fit: cover"
          />
        </div>
      </div>
      <div class="row-menu bg-menu">
        <div class="col-9 pr-1 ">
          <div class="row">
            <div
              class="card mg-5 col-5 pd-10"
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
                <h6 class="card-title"> {{ dish.name }}</h6>
                <h6 class="card-title">Prezzo: {{ dish.price }} €</h6>
                <p class="card-title">Descrizione: {{ dish.description }}</p>
                <p class="card-title grow">Ingredienti: {{ dish.ingredients }}</p>
                <div>

                <button class="btn btn-primary" @click="increse(index)">
                  +
                </button>
                <button class="btn btn-primary" @click="decrese(index)">
                  -
                </button>
                </div>
                <br />
              </div>
            </div>
          </div>
        </div>
        <div class="card col-3 mg-t-5" style="width: 18rem" v-if="cart.length > 0">
        <div class="card-header">Il tuo ordine</div>
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
            <li class="list-group-item"> <strong> Prezzo totale: </strong> <br> {{ prezzototale.toFixed(2)}} € </li>
          </ul>
          <a href="/payment">
            <button
              type="button"
              class="btn btn-info spacing" @click="save">
              Go To Checkout
            </button>
          </a>
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
    // sganciaisordi: String,
  },
  data() {
    return {
      ristorante: {},
      dishes: [],
      id: this.id,
      cart: [],
      prezzototale: 0,
      allDishQuantity: [],
    };
  },
  methods: {
    increse(i) {
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
      localStorage.setItem('restaurant_id', this.id);
    },

    decrese(i) {
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
      localStorage.setItem('restaurant_id', this.id);
    },
    save: function () {
      localStorage.setItem('prezzototale', this.prezzototale);
      localStorage.setItem('plates', JSON.stringify(this.dishes));
      localStorage.setItem('restaurant_id', this.id);
      }
  },
  // methods: {
  //   increse(i) {
  //     const checkPresenza = this.cart.indexOf(this.dishes[i]);

  //     ////if non c'e' gia' nel carrello
  //     if (checkPresenza === -1) {
  //       this.cart.push(this.dishes[i]);
  //       this.cart[i].quantity = 1;
  //     } else {
  //       this.cart[i].quantity++;
  //     }

  //     this.prezzototale += parseFloat(this.cart[i].price);
  //   },

  //   decrese(i) {
  //     const checkPresenza = this.cart.indexOf(this.dishes[i]);
  //     if (checkPresenza > -1 && this.cart[i].quantity === 1) {
  //       this.prezzototale -= parseFloat(this.cart[i].price);

  //       //deleta il primo dish corrispondente dal carrello, partendo da this.cart[0]
  //       this.cart.splice(checkPresenza, 1);

  //     } else {
  //       this.cart[i].quantity--;

  //       if (this.cart[i].quantity)
  //       this.prezzototale -= parseFloat(this.cart[i].price);
  //     }
  //   },
  // },
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


