<template>
  <div class="services">
    <loading
      loader="dots"
      :active="isLoading"
      :color="color"
      :height="size"
      :width="size"
    />
    <h1 class="services__title title">
      Services
    </h1>

    <div>
      <p class="services__subtitle">
        Retrouvez ci-dessous la liste de tout nos services
      </p>
    </div>
    <router-link
      v-if="getUser"
      to="/ajouter-service"
      class="services__add navbar__link"
      title="Ajouter un service"
    >
      <inline-svg
        class="service__add-svg"
        :src="require('../../img/svg/plus.svg').default"
        :width="30" 
        :height="30"
      />
    </router-link>
    <template
      v-for="service in getServices"
    >
      <Vignettes
        :id="service.id"
        :key="service.title"
        :name="service.title"
        :description="service.description"
        :price="service.price"
        class="services__vignettes"
      >
        <div 
          slot="footer"
          class="vignette__slot"
        >
          <div
            v-if="getUser"
            class="vignette__trash"
            @click="deleteService(service.id)"
          >
            <inline-svg
              class="vignette__trash-svg"
              :src="require('../../img/svg/trash.svg').default"
              :width="20" 
              :height="20"
              color="red"
            />
          </div>
          
          <button
            class="vignette__button"
            @click="goTo(service.id)"
          >
            Plus d'info
          </button>
        </div>
      </vignettes>
    </template>
  </div>
</template>

<script>
import Vignettes from '../components/Vignettes.vue'
import { getAllServices, deleteService } from '../services/api'
import Loading from "vue-loading-overlay";
import 'vue-loading-overlay/dist/vue-loading.css';
import { mapActions, mapGetters } from 'vuex'

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
  computed: {
    ...mapGetters([
      'getServices',
      'getUser'
    ])
  },
  watch: {
    getServices () {
      this.services = [...this.getServices]
      this.isLoading = false
    }
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
      'setServices',
      'updateService'
    ]),
    goTo (route) {
      this.$router.push({path: '/services/mono-service', query: {id: route}})
    },
    async deleteService (id) {
      if (window.confirm("Voulez vous supprimer ce service ?")) {
        this.isLoading = true
        try {
          await deleteService(id)
          this.updateService()
        } catch (e) {
          console.error(e)
          this.isLoading = false
        }
      }

    },
  }
};
</script>

<style lang="scss">
@import "../../styles/variables.css";
.services {
  margin: 5rem auto;
  text-align: center;
  &__subtitle {
    font-size: 1.5rem;
  }
  &__add {
    margin: auto;
    width: 5rem;
  }
  &__vignettes {
    background-color: var(--vignette-service);
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
      border: 2px solid var(--font-grey);
      color: #FFF;
      font-weight: bold;
      padding: 0.7rem 2.2rem;
      background-color: var(--font-grey);
    }
    &__button:hover {
      border: 2px solid var(--kuroe-dark-blue);
      background-color: var(--kuroe-dark-blue);
    }
    &__service {
      width: auto;
    }
    &__trash {
      position: relative;
      top: -9rem;
      left: 8rem;
      cursor: pointer;
    }
  }
}
</style>
