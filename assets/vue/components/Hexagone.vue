<template>
  <div 
    class="hexagone"
    :class="{ 'hexagone__cursor' : imgClick }"
  >
    <img
      :src="require(`../../img/insta/${name}.jpg`).default"
      class="hexagone__img"
      alt=""
      @click="goTo(url)"
    >
    <inline-svg
      class="hexagone__svg-insta"
      :src="require('../../img/svg/instagram.svg').default"
      :width="size" 
      :height="size"
      :color="greyLight"
      @click="goTo(url)"
    />
  </div>
</template>

<script>

export default {
  name: "Hexagone",
  props: {
    name: {
      type: String,
      default: ''
    },
    url: {
      type: String,
      default: ''
    },
    imgClick: {
      type: Boolean,
      default: false
    }
  },
  data () {
    return { 
      size: '15',
      greyLight: '#ffffffc4'
    }
  },
  methods: {   
    goTo (route) {
      if (this.imgClick) {
        window.open(route, '_blank')
      }
    }
  }
};

</script>

<style lang="scss">
@import "../../styles/variables.css";
.hexagone {
    clip-path: polygon(33.33% 0%, 66.66% 0%, 100% 33.33%, 100% 66.66%, 66.66% 100%, 33.33% 100%, 0 66.66%, 0 33.33%);
    margin: 2rem;
    position: relative;
    &__img {
      width: 30rem;
      transition: transform 2s;
    }
    &__svg-insta {
        position: absolute;
        padding: 0.5rem;
        left: 14rem;
        bottom: 2rem;
        width: 3rem;
        height: 3rem;
        background-color: #00000059;
        border-radius: 50%;
        z-index: -1;
    }
    &__cursor {
        cursor: pointer;
    }
}
.hexagone:hover {
    .hexagone__svg-insta {
        z-index: 1;
    }
    .hexagone__img {
        transform: scale(1.2);
        filter: brightness(0.9);
    }
}
</style>