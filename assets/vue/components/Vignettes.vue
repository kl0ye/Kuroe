<template>
  <div class="vignette">
    <img
      :src="require('../../img/paint.jpg')"
      class="vignette__img"
      alt="" 
    >
    <div class="vignette__details">
      <div class="vignette__service">
        <h2 class="vignette__service-title">
          {{ name }}
        </h2>
        <p class="vignette__service-text">
          {{ description }}
        </p>
      </div>
      <p class="vignette__price">
        {{ price }}€/m²
      </p>
    </div>
    <slot name="footer" />
  </div>
</template>

<script>

export default {
  name: "Vignettes",
  props: {
    name: {
      type: String,
      default: ''
    },
    description: {
      type: String,
      default: ''
    },
    price: {
      type: Number,
      default: null
    }
  }
};

</script>

<style lang="scss">
@import "../../styles/variables.css";
.vignette {
  width: 35rem;
  background-color: var(--vignette-blue);
  border-radius: 0.5rem;
  padding: 2.5rem 2rem;
  margin: 2rem;
  &__img {
    width: 31rem;
    height: 20em;
    text-align: center;
    border-radius: 0.5rem;
    filter: grayscale(1);
  }
  &__details {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 15rem;
  }
  &__service {
    width: 60%;
    &-title {
      font-family: 'Lobster';
      font-size: 3.5rem;
    }
    &-text {
      font-size: 1.2rem;
    }
  }
  &__price {
    font-family: 'Lobster';
    font-size: 3.5rem;
  }
}
.vignette:hover {
  background-color: var(--vignette-blue-light);
  img {
    filter: none;
  }
}

</style>
