<template>
  <div
    :id="id"
    class="fluid-container"
  >
    <nav class="navbar navbar-expand-lg navbar--bg">
      <router-link
        to="/home"
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
}
</style>
