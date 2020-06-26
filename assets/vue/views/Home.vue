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
        :src="require('../../img/bg1.jpg').default"
        class="home__header-img"
        alt="" 
      >
      <div class="home__header-text">
        <h2 class="home__header-title">
          Envie de tout changer ?
        </h2>
        <p class="home__header-subtitle">
          N'attendez plus, consultez nos tous services et<br>
          prenez contact avec nous directement en ligne !
        </p>
      </div>
    </div>
    <div class="home__services">
      <h2 class="home__title title">
        Nos Services
      </h2>
    </div>
    <div class="home__services-vignettes">
      <carousel
        :loop="true"
        :per-page-custom="items"
        :pagination-color="dotColor"
        :pagination-active="dotColorActive"
      >
        <slide 
          v-for="(service, index) in services"
          :key="`${service.title}-${index}`"
        >
          <Vignettes
            :id="service.id"
            :name="service.title"
            :description="service.description"
            :price="service.price"
            class="home__vignette-link"
            :img-click="true"
          />
        </slide>
      </carousel>
    </div>
    <div class="home__about-us">
      <h2 class="home__title title">
        Qui sommes nous ?
      </h2>
      <DescriptifEntreprise />
    </div>
    <div class="home__instagram">
      <h2 class="home__title title">
        Quelques réalisations
      </h2>
      <div class="home__instagram-feed">
        <div 
          v-for="photo in photosInsta"
          :key="photo.name"
        >
          <Hexagone
            class="home__hexagone"
            :name="photo.name"
            :url="photo.url"
            :img-click="true"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import Vignettes from '../components/Vignettes.vue';
import Hexagone from '../components/Hexagone.vue';
import DescriptifEntreprise from '../components/DescriptifEntreprise.vue';
import { Carousel, Slide } from 'vue-carousel';
import { getAllServices } from '../services/api'
import Loading from "vue-loading-overlay";
import 'vue-loading-overlay/dist/vue-loading.css';
import { mapActions, mapGetters } from 'vuex'

export default {
  name: "Home",
  components: {
    Vignettes,
    Carousel,
    Slide,
    Loading,
    DescriptifEntreprise,
    Hexagone
  },
  data () {
    return {
      services: [],
      items: [
        [0, 1],
        [668, 2],
        [1150, 3],
        [1570, 4]
      ],
      isLoading: true,
      color: '#044088',
      size: 105,
      dotColorActive: '#666',
      dotColor: '#f0f0f0',
      photosInsta: [
        {name: 'IMG_01', url:'https://www.instagram.com/p/B_sM1kBHwkm/'},
        {name: 'IMG_02', url:'https://www.instagram.com/p/B_sM3KIHv3u/'},
        {name: 'IMG_03', url:'https://www.instagram.com/p/B_sM4iVnbto/'},
        {name: 'IMG_04', url:'https://www.instagram.com/p/B_sM5SHnuCM/'},
        {name: 'IMG_05', url:'https://www.instagram.com/p/B_sM8PXnXxR/'},
        {name: 'IMG_06', url:'https://www.instagram.com/p/B_sM-5Snl2k/'},
        {name: 'IMG_07', url:'https://www.instagram.com/p/CAfiYsMH2D-/'},
        {name: 'IMG_08', url:'https://www.instagram.com/p/CAfigBSHygz/'},
        {name: 'IMG_09', url:'https://www.instagram.com/p/CAfjnb6n6hn/'},
        {name: 'IMG_10', url:'https://www.instagram.com/p/CAfjt5onA9G/'}
      ]
    }
  },
  computed: {
    ...mapGetters([
      'getServices'
    ])
  },
  async created () {
    if (this.getServices) {
      this.services = [...this.getServices]
      this.isLoading = false
    } else {
      try {
        const res = await getAllServices()
        if (res) {
          this.services = res.data
          this.setServices(this.services)
          this.isLoading = false
        }
      } catch (e) {
        console.error(e)
      }
    }
  },
  methods: {
    ...mapActions([
      'setServices'
    ])
  }
};
</script>
<style lang="scss">
@import "../../styles/variables.css";

.home {
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
      @media(max-width: 576px){ 
        padding-left: 2rem;
      }
    }
    &-title {
      font-family: 'Lobster';
      font-size: 5.5rem;
      @media(max-width: 576px){ 
        font-size: 3.5rem
      }
    }
    &-text {
      font-size: 2rem;
      @media(max-width: 576px){ 
        font-size: 1.2rem;
      }
    }
  }
  &__services-vignettes {
    .VueCarousel-slide {
      text-align: -webkit-center;
    }
    .vignette__service-text {
      max-height: 7rem;
      overflow: hidden;
    }
  }
  &__about-us {
    background-color: var(--bg-grey);
    padding: 3rem 0;
    margin-top: 2rem;
  }
  &__instagram-feed {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    max-width: 170rem;
    margin: 5rem auto;
  }
  .lightwidget--grid {
    margin: 1rem 30rem;
  }
}
</style>