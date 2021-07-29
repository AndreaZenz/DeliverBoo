<template>
  <div class="container">
    <div class="card-body">
      <form @submit.prevent="filterData" @reset="onReset">
        <div class="row">
          <div class="col">
            <text-input @input="filterData" label="Nome" v-model="filters.name"></text-input>
            <div class="col">
              <multi-check-input
                label="Types"
                :items="types"
                v-model="filters.types"
              ></multi-check-input>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Filtra</button>
      </form>
      
      <button type="reset" href="#" class="btn btn-outline-secondary">
        <a href="/">Annulla filtri</a>
      </button>

      
    </div>
    <div class="alert alert-success mb-5" v-if="activeFilters">
      Sono stati trovati {{ restaurantsList.length }} risulati per il filtro:
      <div v-html="printActiveFilters()"></div>
    </div>

    <div class="row justify-content-center">
      <div class="col-12 d-flex flex-row">
        <restaurant-card
          v-for="restaurant in restaurantsList"
          :key="restaurant.id"
          :img-url="restaurant.img_url"
          :name="restaurant.name"
          :types="restaurant.types"
          :link="restaurant.link"
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
        names: null,
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
      this.filters.name = "";
      this.filters.type = null;
    },
    // resetTypes() {
    //   this.restaurantsList = this.allRestaurantsList;
    //   this.filters.name = "";
    //   this.filters.type = [];
    //   this.activeFilters = null;
    // },
    printActiveFilters() {
      const toReturn = [];

      if (Object.keys(this.activeFilters).length === 0) {
        return;
      }

      for (const chiaveFiltro in this.activeFilters) {
        toReturn.push(chiaveFiltro + " = " + this.activeFilters[chiaveFiltro]);
      }

      return toReturn.join("<br>");
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

