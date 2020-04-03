<template>
  <div class="home">
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
      <a
        href="#myCarousel"
        role="button"
        data-slide="prev"
      >
        <span
          aria-hidden="true"
        />
        <span class="sr-only">Previous</span>
      </a>
      <div
        v-for="service in services"
        :key="service.id"
      >
        <Vignettes
          :name="service.title"
          :description="service.description"
          :price="service.price"
        />
      </div>
      <a
        href="#myCarousel"
        role="button"
        data-slide="next"
      >
        <span
          aria-hidden="true"
        />
        <span class="sr-only">Next</span>
      </a>
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
import { getAllServices } from '../services/api'


export default {
  name: "Home",
  components: {
    Vignettes
  },
  data () {
    return {
      services: []
    }
  },
  async created () {
    try {
      const res = await getAllServices()
      if (res) {
        this.services = res.data
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
  &__services {
    &-vignettes {
      display: flex;
      justify-content: space-evenly;
      flex-wrap: wrap;
      margin: 5rem 2rem;
    }
  }
}
</style>