<template>
  <div class="row descriptif">
    <div class="descriptif__travaux col-12 col-md-6">
      <div class="col-md-2">
        <div class="descriptif__icon-container">
          <inline-svg
            class="descriptif__icon"
            :src="require('../../img/svg/brush.svg').default"
            :width="size" 
            :height="size"
            color="white"
          />
        </div>
      </div>
      <p class="descriptif__texte col-8">
        But I must explain to you how all this mistaken idea of denouncing pleasure 
        and praising pain was born and I will give you a complete account of the system
      </p>
    </div>
    <div class="descriptif__travaux descriptif__travaux--inverse col-12 col-md-6">
      <div class="col-md-2">
        <div class="descriptif__icon-container descriptif__icon-container--dark">
          <inline-svg
            class="descriptif__icon"
            :src="require('../../img/svg/hammer.svg').default"
            :width="size" 
            :height="size"
            color="white"
          />
        </div>
      </div>
      <p class="descriptif__texte descriptif__texte--inverse col-8">
        But I must explain to you how all this mistaken idea of denouncing pleasure 
        and praising pain was born and I will give you a complete account of the system
      </p>
    </div>
    <div class="descriptif__travaux col-12 col-md-6">
      <div class="col-md-2">
        <div class="descriptif__icon-container descriptif__icon-container--dark">
          <inline-svg
            class="descriptif__icon"
            :src="require('../../img/svg/tools.svg').default"
            :width="size" 
            :height="size"
            color="white"
          />
        </div>
      </div>
      <p class="descriptif__texte col-8">
        But I must explain to you how all this mistaken idea of denouncing pleasure 
        and praising pain was born and I will give you a complete account of the system
      </p>
    </div>
    <div class="descriptif__travaux descriptif__travaux--inverse col-12 col-md-6">
      <div class="col-md-2">
        <div class="descriptif__icon-container">
          <inline-svg
            class="descriptif__icon"
            :src="require('../../img/svg/paint-roller.svg').default"
            :width="size" 
            :height="size"
            color="white"
          />
        </div>
      </div>
      <p class="descriptif__texte descriptif__texte--inverse col-8">
        But I must explain to you how all this mistaken idea of denouncing pleasure 
        and praising pain was born and I will give you a complete account of the system
      </p>
    </div>
  </div>
</template>

<script>

export default {
  name: "DescriptifEntreprise",
  data () {
    return { 
      size: '40'
    }
  },
};

</script>

<style lang="scss">
@import "../../styles/variables.css";

.descriptif {
  display: flex;
  flex-wrap: wrap;
  margin: 0 5%;
  @media(max-width:992px){
    margin: 0;
  }
  .col-md-2 {
    text-align: -webkit-center;
  }
  &__icon-container {
    width: 7rem;
    height: 7rem;
    background-color: var(--blue-light);
    padding: 1rem;
    border-radius: 50%;
    display:flex;
    align-items: center;
    justify-content: center;
    &--dark {
      background-color: var(--vignette-blue);
    }
  }
  @media(max-width: 576px) {
    &__texte--inverse {
      text-align: right;
    }
  }
  &__travaux {
    width: 55rem;
    padding: 3.5rem 5rem;
    display: flex;
    align-items: center;
    @media(max-width: 1350px){
      justify-content: space-around;
    }
    @media(max-width:992px){
      width: 55rem;
      padding: 0.5rem 1rem;
      display: flex;
      align-items: center;
      justify-content: space-evenly;
    }
    &--inverse {
      @media(max-width: 576px) {
        flex-direction: row-reverse;
      }
    }   
  }
}

</style>