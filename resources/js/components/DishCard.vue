<template>
  <div class="card mg-top-bot-10 col-4">
              <img
                :src="imgUrl"
                class="img-fluid card-img-top"
                style="width: 100%; max-height: 150px; object-fit: cover"
                alt=""
              />
              <div class="card-body">
                <h5 class="card-title">Name: {{ name }}</h5>
                <h5 class="card-title">Prezzo: {{ price }}</h5>
                <h5 class="card-title">Descrizione: {{ description }}</h5>
                <h5 class="card-title">Ingredienti: {{ ingredients }}</h5>
                <button class="btn btn-primary" @click="increse(index)">
                  +
                </button>
                <button class="btn btn-primary" @click="decrese(index)">
                  -
                </button>
                <br />
              </div>
          </div>
</template>

<script>
export default {
  name: "DishCard",
  props: {
    name: String,
    imgUrl: String,
    title: String,
    price: Number,
    description: String,
    ingredients: String,
    link: String
  },
  data() {
    return {
      allDishList: [],
      dishList: [],
      dishes: [],
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
  computed: {
        imgSrc() {
            const defaultImg =
                "https://www.linga.org/site/photos/Largnewsimages/image-not-found.png";
            //src="{{ $post->cover_url ? asset('storage/' . $post->cover_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png'}}"
            return this.coverUrl ? "storage/" + this.coverUrl : defaultImg;
        },
        contentText() {
            const maxLength = 80;

            if (this.content.length > maxLength) {
                return this.content.slice(0, 80) + "...";
            }

            return this.content;
        }
    }
};
</script>