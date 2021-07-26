<template>
  <div class="col-4">
    <div class="card mg-top-bot-10" style="width: 100%">
      <img
        :src="imgUrl"
        class="img-fluid card-img-top"
        style="width: 100%; max-height: 150px; object-fit: cover"
        alt=""
      />
      <div class="card-body">
        <h5 class="card-title">{{ name }}</h5>
        <h4 class="card-text">{{ address }}</h4>
        <a :href="link">Apri</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "RestaurantCard",
  props: {
    imgUrl: String,
    name: String,
    address: String,
    link: String,
  },
  computed: {
    imgSrc() {
      const defaultImg =
        "https://www.linga.org/site/photos/Largnewsimages/image-not-found.png";

      return this.imgUrl ? "storage/" + this.imgUrl : defaultImg;
    }
  },
};
</script>