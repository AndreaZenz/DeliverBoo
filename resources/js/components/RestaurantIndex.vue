<template>
  <div class="container">
    <form @submit.prevent="filterData" @reset="onReset">
      <div class="row">
        <div class="col">
          <text-input label="Nome" v-model="filters.name"></text-input>
          <div class="col">
            <multi-check-input
              label="type"
              :items="types"
              v-model="filters.types"
            ></multi-check-input>
          </div>
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
          :link="restaurant.link"
          :types="restaurant.type"
        ></restaurant-card>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "RestaurantIndex",
  props: {
  types: Array,
  },
  data() {
    return {
      allRestaurantsList: [],
      restaurantsList: [],
      filters: {
        name: "",
        address: "",
        types: null,
      },
      activeFilters: null,
      typesList: [],
    };
  },
  methods: {
    filterData() {
      axios
        .get("/api/restaurants/filter", {
          params: this.filters,
        })
        .then((resp) => {
          this.restaurantsList = resp.data.results;
          this.activeFilters = resp.data.filters;
        })
        .catch((er) => {
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
    axios
      .get("/api/types")
      .then((resp) => {
        this.typesList = resp.data.results;
      })
      .catch((er) => {
        console.error(er);

        alert("Non posso recuperare le tipologie di ristorante");
      });
  },
};
</script>

