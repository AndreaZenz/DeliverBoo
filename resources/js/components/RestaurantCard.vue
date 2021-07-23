<template>
    <div class="col-4">
        <h1>{{ name }}</h1>
        <h2>{{ address }}</h2>
        <img :src="imgUrl" class="img-fluid" style="width: 100%; max-height: 150px; object-fit: cover" alt="">
    </div>
</template>

<script>
export default {
    name: "RestaurantCard",
    props: {
        imgUrl: String,
        name: String,
        address: String
    },
    computed: {
        imgSrc() {
            const defaultImg = 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png'
            
            return this.imgUrl ? ("storage/" + this.imgUrl) : defaultImg;
        }
    }
}
</script>