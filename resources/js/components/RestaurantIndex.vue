<template>
  <div class="container">
    <form @submit.prevent="filterData" @reset="onReset">
      <div class="row">
        <div class="col">
          <text-input label="Nome" v-model="filters.name"></text-input>
          <text-input label="Indirizzo" v-model="filters.address"></text-input>
        </div>

      </div>

      <button type="submit" class="btn btn-primary">Filtra</button>
      <button type="reset" class="btn btn-outline-secondary">
        Annulla filtri
      </button>
    </form>
    <div class="row justify-content-center">
      <div class="col-12">
        <restaurant-card
          v-for="restaurant in restaurantsList"
          :key="restaurant.id"
          :img-url="restaurant.img_url"
          :name="restaurant.name"
          :address="restaurant.address"
        ></restaurant-card>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "RestaurantIndex",
  data() {
    return {
      allRestaurantsList: [],
      restaurantsList: [],
      filters: {
          name:null,
          address:null
      },
      activeFilters: null
    };
  },
  methods: {
      filterData() {
            axios
                .get("/api/restaurants/filter", {
                    params: this.filters
                })
                .then(resp => {
                    this.restaurantsList = resp.data.results;
                    this.activeFilters = resp.data.filters;
                })
                .catch(er => {
                    console.error(er);
                    alert("Errore in fase di filtraggio dati.");
                });
        },
        onReset() {
            this.restaurantsList = this.allRestaurantsList;
            this.activeFilters = null;
        },
  },
  mounted() {
    axios
      .get("/api/restaurants")
      .then((resp) => {
        this.allRestaurantsList = resp.data.results;
        this.restaurantsList = resp.data.results;
      })
      .catch((er) => {
        alert("Impossibile recuperare l'elenco dei ristoranti");
      });
  },
};
</script>