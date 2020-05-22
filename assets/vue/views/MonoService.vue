<template>
  <div class="service row">
    <div class="service__contain-img col-6">
      <img
        :src="require(`../../img/${myService.title}.jpg`).default"
        class="service__img"
        alt="" 
      >
    </div>
    <div class="service__details col-4">
      <h2 class="service__title">
        {{ myService.title }}
      </h2>
      <p class="service__text">
        {{ myService.description }}
      </p>
      <p class="service__text">
        The most common lorem ipsum text reads as follows: Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <p class="service__price">
        {{ myService.price }}€/m²
      </p>
      <button
        class="service__link-contact"
        @click="goTo('/contact')"
      >
        Demande d'information
      </button>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: "MonoService",
  data () {
    return {
      services: [],
      myService: {}
    }
  },
  computed: {
    ...mapGetters([
      'getServices'
    ])
  },
  created () {
    let id = this.$route.query.id
    this.services = [...this.getServices]
    this.myService = this.services.find(e => e.id === id)
  },
  methods: {
    goTo (route) {
      this.$router.push(route)
    }
  }
};
</script>

<style lang="scss">
@import "../../styles/variables.css";
.service {
  margin: 5rem 0;
  &__contain-img {
    margin: 0 5rem;
    overflow: hidden;
    display: flex;
    justify-content: center;
  }
  &__img {
    width: 77.5rem;
    height: 50rem;
  }
  &__details {
    margin-top: 3rem;
  }
  &__title {
    font-family: 'Lobster';
    font-size: 5.5rem;
    margin-bottom: 2rem;
  }
  &__text {
    font-size: 1.2rem;
  }
  &__price {
    font-family: 'Lobster';
    font-size: 3.5rem;
  }
  &__link-contact {
    margin-top: 5rem;
    border-radius: 50rem;
    border: 2px solid var(--font-grey);
    color: #FFF;
    font-weight: bold;
    padding: 0.7rem 2.2rem;
    background-color: var(--font-grey);
  }
  &__link-contact:hover {
    border: 2px solid var(--kuroe-dark-blue);
    background-color: var(--kuroe-dark-blue);
  }
}


</style>