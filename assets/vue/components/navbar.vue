<template>
  <div
    :id="id"
    class="fluid-container"
  >
    <nav class="navbar navbar-expand-lg navbar--bg">
      <router-link
        to="/home"
        class="navbar__home-logo"
      >
        <img
          :src="require('../../img/KuroeLogo.png').default"
          class="navbar__logo"
          alt="logo" 
        >
      </router-link>
      <router-link
        class="navbar__link"
        to="/services"
      >
        Services
      </router-link>
      <router-link
        class="navbar__link"
        to="/realisations"
      >
        Réalisations
      </router-link>
      <router-link
        class="navbar__link"
        to="/contact"
      >
        Contact
      </router-link>

      <router-link
        class="navbar__link ml-sm-auto navbar__icon"
        to="/connexion"
      >
        <inline-svg
          class="navbar__icon-svg"
          :src="require('../../img/svg/log.svg').default"
          :width="size" 
          :height="size"
        />
      </router-link>
    </nav>
  </div>
</template>

<script>
export default {
  name: "Navbar",
  props: {
    id:  {
      type: String,
      default: 'ok'
    }
  },
  data () {
    return {
      size: 25
    }
  }
};
</script>
<style lang="scss">
@import "../../styles/variables.css";
.navbar {
  &--bg {
    background-color: var(--blue-light);
  }
  &__logo {
    width: 9rem;
    margin: 1.5rem 2rem 1.5rem 4rem;
  }
  &__icon {
    margin-right: 4rem;
  }
  &__link {
    margin: 0 1rem;
    font-size: 2rem;
    font-weight: 500;
    font-family: 'Lobster';
    color: var(--kuroe-dark-blue);
  }
  &__link:hover {
    text-decoration: none;
    color: var(--kuroe-light-blue);
  }
  @media (max-width: 490px) {
    &__link {
      font-size: 1.7rem;
    }
    &__icon-svg {
      width: 1.5rem;
      height: 1.5rem;
    }
    &__home-logo {
      width: 100%;
      text-align: center;
    }
  }
}
</style>
