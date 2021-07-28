<template>
  <div class="container">
    <div class="card-body">
      

      
    </div>

    <div class="row justify-content-center">
      <div class="col-12">
        <dish-card
          v-for="dish in dishList"
          :key="dish.id"
          :img-url="dish.img_url"
          :name="dish.name"
          :types="dish.types"
          :link="dish.link"
        ></dish-card>
        <order-card
          v-for="order in orderList"
          :key="order.id"
          :img-url="order.img_url"
          :name="order.name"
          :types="order.types"
          :link="order.link"
        ></order-card>
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

