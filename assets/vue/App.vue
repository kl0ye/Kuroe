<template>
  <div class="fluid-container">
    <Navbar :id="idNavbar" />
    <router-view class="view-block" />
    <Footer />
  </div>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Footer from './components/Footer.vue'

export default {
  name: "App",
  components: {
    Navbar,
    Footer
  },
  data () {
    return { 
      idNavbar: 'navbar'
    }
  },
}
</script>
<style lang="scss">
@import "../styles/variables.css";
.view-block {
  min-height: 50rem;
  color: var(--font-grey);  
}
</style>
