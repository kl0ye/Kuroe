<template>
  <div class="realisation">
    <h2 class="realisation__title title">
      Réalisations
    </h2>

    <div>
      <p class="realisation__subtitle">
        Découvrez toutes nos realisations en image
      </p>
    </div>

    <div class="realisation__portfolio-feed">
      <div 
        v-for="(photo, index) in portfolio"
        :key="index"
      >
        <img
          :src="require(`../../img/portfolio/${photo}.jpg`).default"
          class="realisation__img"
          alt=""
        >
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "Realisations",
  data () {
    return {
      portfolio: [
        'IMG_01',
        'IMG_02',
        'IMG_03',
        'IMG_04',
        'IMG_05',
        'IMG_06',
        'IMG_07',
        'IMG_08'
      ]
    }
  }
};
</script>
<style lang="scss">
@import "../../styles/variables.css";
.realisation {
  text-align: center;
  max-width: 140rem;
  margin: 2rem auto;
  &__subtitle {
      font-size: 1.5rem;
  }
  &__portfolio-feed {
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    margin: 2rem 5rem;
  }
  &__img {
    width: 30rem;
    margin: 1rem;
    transition: transform 2s;
  }
  &__img:hover {
    transform: scale(1.1);
  }
}
</style>