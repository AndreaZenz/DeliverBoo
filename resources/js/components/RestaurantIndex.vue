<template>
  <div>
    <div class="background-search">
      <div class="jumbo-box">
        <div class="container">
          <div class="row">
            <form @submit.prevent="filterData" @reset="onReset">
              <div class="row">
                <div class="front-text">
                  <h1>I piatti che ami, a domicilio</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-12 border bg-white filtra">
                  <div class="row">
                    <div class="col-12">
                      <form @submit.prevent="filterData" @reset="onReset">
                        <text-input
                          @input="filterData"
                          label="Nome"
                          v-model="filters.name"
                          placeholder="Nome del ristorante"
                        ></text-input>

                        <multi-check-input
                          label="Types"
                          :items="types"
                          v-model="filters.types"
                        ></multi-check-input>
                        <button
                          type="submit"
                          class="btn btn-primary position-bar"
                        >
                          Filtra
                        </button>
                        <button
                          type="reset"
                          href="#"
                          class="btn btn-outline-secondary position-stop-f"
                        >
                          <a href="/">Annulla filtri</a>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="restaurant-index container">
      <div class="row justify-content-center">
        <transition name="fade" mode="out-in">
          <div
            v-if="filteredRestaurant"
            class="col-12 d-flex flex-row flex-wrap guest-restaurants-card-container"
          >
            <restaurant-card
              v-for="restaurant in filteredRestaurant"
              :key="restaurant.id"
              :img-url="restaurant.img_url"
              :name="restaurant.name"
              :types="restaurant.types"
              :link="restaurant.link"
            ></restaurant-card>
          </div>
        </transition>
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
      filteredRestaurant: [],
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
          this.filteredRestaurant = resp.data.results;
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

