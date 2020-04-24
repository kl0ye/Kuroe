<template>
  <div class="services">
    <loading
      loader="dots"
      :active="isLoading"
      :color="color"
      :height="size"
      :width="size"
    />
    <h1 class="services__title">
      Services
    </h1>

    <div>
      <p>Tout nos services</p>
    </div>
    <template
      v-for="service in services"
    >
      <Vignettes
        :key="service.id"
        :name="service.title"
        :description="service.description"
        :price="service.price"
      >
        <div 
          slot="footer"
          class="vignette__slot"
        >
          <button class="vignette__button">
            Plus d'info
          </button>
        </div>
      </vignettes>
    </template>
  </div>
</template>

<script>
import Vignettes from '../components/Vignettes.vue'
import { getAllServices } from '../services/api'
import Loading from "vue-loading-overlay";
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
  name: "Services",
  components: {
    Vignettes,
    Loading
  },
  data () {
    return {
      services: [],
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
.services {
  margin: 5rem auto;
  text-align: center;
  &__title {
    font-size: 5rem;
    font-family: 'Lobster';
    margin: 2rem 0;    
  }
  .vignette {
    width: 80%;
    margin: 2rem auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    &__details {
      display: block;
      margin-left: -15rem;
    }
    &__slot {
      position: relative;
      margin-right: 5rem;
    }
    &__button {
      border-radius: 50rem;
      border: 2px solid var(--kuroe-dark-blue);
      color: var(--kuroe-dark-blue);
      font-weight: bold;
      padding: 0.5rem 2rem;
      background-color: transparent;
    }
    &__service {
      width: auto;
    }
  }
}
</style>
