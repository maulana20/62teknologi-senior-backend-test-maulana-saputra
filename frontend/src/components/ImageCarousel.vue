<template>
  <div style="padding-bottom: 30px;">
    <VueSlickCarousel :dots="true" v-if="imgs.length > 0">
      <div v-for="(img, index) in imgs" v-bind:key="index">
        <img :src="img"  :style="{ width: '350px', height: '200px'}">
      </div>
    </VueSlickCarousel>
  </div>
</template>
<script>
import VueSlickCarousel from 'vue-slick-carousel';
import 'vue-slick-carousel/dist/vue-slick-carousel.css';
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css';
export default
{
  name: 'ImageCarousel',
  props: [
    'images'
  ],
  components: {
    VueSlickCarousel
  },
  data: function() {
    return {
      imgs: []
    }
  },
  mounted: function() {
    this.imgs = this.images.map((res) => window.location.origin + "/api/business/image/" + res.image.substring(res.image.lastIndexOf('/')+1));
  }
}
</script>
