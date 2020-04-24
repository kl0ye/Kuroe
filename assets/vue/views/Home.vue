<template>
  <div class="home">
    <loading
      loader="dots"
      :active="isLoading"
      :color="color"
      :height="size"
      :width="size"
    />
    <div class="home__header">
      <img
        :src="require('../../img/bg1.jpg')"
        class="home__header-img"
        alt="" 
      >
      <div class="home__header-text">
        <h2 class="home__header-title">
          Envie de tout changer ?
        </h2>
        <p class="home__header-subtitle">
          N'attendez plus, consultez nos tous services et<br>
          prenez rendez-­vous directement en ligne !
        </p>
      </div>
    </div>
    <div class="home__services">
      <h2 class="home__title">
        Nos Services
      </h2>
    </div>
    <div class="home__services-vignettes">
      <carousel
        :loop="true"
        :per-page-custom="items"
      >
        <slide 
          v-for="service in services"
          :key="service.id"
        >
          <Vignettes
            :name="service.title"
            :description="service.description"
            :price="service.price"
          />
        </slide>
      </carousel>
    </div>
    <div class="home__about-us">
      <h2 class="home__title">
        Qui sommes nous ?
      </h2>
    </div>
  </div>
</template>

<script>

import Vignettes from '../components/Vignettes.vue'
import { Carousel, Slide } from 'vue-carousel';
import { getAllServices } from '../services/api'
import Loading from "vue-loading-overlay";
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
  name: "Home",
  components: {
    Vignettes,
    Carousel,
    Slide,
    Loading
  },
  data () {
    return {
      services: [],
      items: [
        [0, 3],
        [1570, 4]
      ],
      isLoading: true,
      color: '#044088',
      size: 105
    }
  },
  async created () {
    try {
      const res = await getAllServices()
      if (res) {
        this.services = res.data
        this.isLoading = false
      }
    } catch (e) {
      console.error(e)
    }
  }
};
</script>
<style lang="scss">
@import "../../styles/variables.css";

.home {
  &__title {
    font-size: 5rem;
    font-family: 'Lobster';
    text-align: center;
    margin: 2rem 0;    
  }
  &__header {
    width: 100%;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    &-text {
      position: absolute;
      width: 100%;
      margin-top: -10rem;
      padding-left: 5rem;
    }
    &-title {
      font-family: 'Lobster';
      font-size: 5.5rem;
    }
    &-text {
      font-size: 2rem;
    }
  }
  &__services-vignettes {
    .VueCarousel-slide {
      text-align: -webkit-center;
    }
  }
}
</style>