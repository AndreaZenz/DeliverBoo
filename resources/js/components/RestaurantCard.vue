<template>
  <div class="col-4">
    <div class="module-wrapper">
      <a :href="link">
        <div class="card mg-top-bot-10 marcos-link" style="width: 100%">
          <img
            :src="imgUrl"
            class="img-fluid card-img-top"
            style="width: 100%; height: 150px; object-fit: cover"
            alt=""
          />
          <div class="card-body">
            <div class="restaurant-name-container">
            <h5 class="card-title">{{ name }}</h5>
            </div>
            <span
              class="badge badge-primary deliveroo-color"
              v-for="type in types"
              :key="type.id"
            >
              {{ type.name }}
            </span>
          </div>
        </div>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  name: "RestaurantCard",
  props: {
    imgUrl: String,
    name: String,
    types: Array,
    link: String,
  },
  computed: {
    imgSrc() {
      const defaultImg =
        "https://www.linga.org/site/photos/Largnewsimages/image-not-found.png";

      return this.imgUrl ? "storage/" + this.imgUrl : defaultImg;
    },
  },
};
</script>