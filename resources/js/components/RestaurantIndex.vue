<template>
  <div class="container">
    <form @submit.prevent="filterData">
      <div class="row">
        <div class="col">
          <text-input label="Nome" v-model="filters.name"></text-input>
          <div class="col">
            <div class="mb-3">
              <label class="form-label">filtri</label>
              <br />
              <div
                class="form-check form-check-inline"
                v-for="type in typesList"
                :key="type.id"
              >
                <label :for="type.id" class="form-check-label">
                  <input
                    :id="type.id"
                    class="form-check-input"
                    type="checkbox"
                    :value="type.id"
                    v-model="filters.type"
                  />
                  {{ type.name }}
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Filtra</button>
      <button
        type="reset"
        class="btn btn-outline-secondary"
        @click="resetTypes()"
      >
        Annulla filtri
      </button>
    </form>

    <div class="alert alert-success mb-5" v-if="activeFilters">
      Sono stati trovati {{ restaurantsList.length }} risulati per il filtro:
      <div v-if="this.filters.name">
        <p>nome:{{ filters.name }}</p>
      </div>
      <div v-if="this.filters.type.length > 0">
        <p>filtri:{{ filters.type }}</p>
      </div>
      <!-- <div v-html="printActiveFilters()"></div> -->
    </div>

    <div class="row justify-content-center">
      <div class="col-12">
        <restaurant-card
          v-for="restaurant in restaurantsList"
          :key="restaurant.id"
          :img-url="restaurant.img_url"
          :name="restaurant.name"
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
        name: null,
        type: [],
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
    // onReset() {
    //   this.restaurantsList = this.allRestaurantsList;
    //   this.filters.name = "";
    //   this.filters.type = null;
    // },
    resetTypes() {
      this.restaurantsList = this.allRestaurantsList;
      this.filters.name = "";
      this.filters.type = [];
      this.activeFilters = null;
    },
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

