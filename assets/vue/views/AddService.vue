<template>
  <div class="new">
    <loading
      loader="dots"
      :active="isLoading"
      :color="color"
      :height="size"
      :width="size"
    />
    <h2 class="new__title title">
      Ajouter Un Nouveau Service
    </h2>
    <div
      v-if="sendFormOk"
      class="new__alert col-md-4 col-10 mb-5 alert alert-success"
      role="alert"
    >
      <inline-svg
        class="new__alert-svg mr-3"
        :src="require('../../img/svg/check.svg').default"
        :width="small" 
        :height="small"
      />
      <p>Ce service a bien été ajouté à la liste.</p>
    </div>
    <div
      v-if="alertInvalid"
      class="new__alert col-md-4 col-10 mb-5 alert alert-danger"
      role="alert"
    >
      <inline-svg
        class="new__alert-svg mr-3"
        :src="require('../../img/svg/alert.svg').default"
        :width="small" 
        :height="small"
      />
      <p> {{ messageAlert }} </p>
    </div>
    <div class="form-row justify-content-center">
      <div class="form-group mr-5">
        <div class="new__form-input ">
          <label for="title" />
          <input
            id="title"
            v-model="model.title"
            type="text"
            class="new__input"
            placeholder="Titre"
            required
          >
        </div>
        <div class="new__form-input">
          <label for="price" />
          <input
            id="price"
            v-model="model.price"
            type="number"
            class="new__input"
            placeholder="Prix en €"
            required
          >
        </div>
      </div>
      <div class="form-group ml-5 new__description">
        <label for="description" />
        <textarea
          id="description"
          v-model="model.description"
          class="new__input new__input--description"
          rows="5"
          placeholder="Ajoutez une brève description"
          required
        />
      </div>
    </div>
    <div
      class="btn btn-secondary contact__form-btn mb-5"
      :class="{ 'contact__form-btn-disabled' : !isValid }"
      @click="sendForm"
    >
      Ajouter
    </div>
  </div>
</template>

<script>
import { newService } from '../services/api'
import { required, minLength, number } from 'vuelidate/lib/validators'
import { mapActions, mapGetters } from 'vuex'
import Loading from "vue-loading-overlay";
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
  name: 'AddService',
  components: {
    Loading
  },
  data() {
    return {
      isValid: false,
      alertInvalid: false,
      messageAlert: '',
      sendFormOk: false,
      small:20,
      model: {
        title: null,
        description: null,
        price: null
      },
      isLoading: false,
      color: '#044088',
      size: 105,
    };
  },
  computed: {
    ...mapGetters([
      'getUser'
    ]),
    isValidForm () {
      return (!this.$v.model.title.$invalid && !this.$v.model.description.$invalid)
    }
  },
  watch: {
    isValidForm (value) {
      if (this.alertInvalid) { this.alertInvalid = false }
      this.isValid = value
    }
  },
  mounted () {
    if (!this.getUser) {
      this.$router.push({path: '/'})
    }
  },
  methods: {
    ...mapActions([
      'updateService'
    ]),
    async sendForm () {
      this.isLoading = true
      if (this.isValid) {
        this.model.price = parseInt(this.model.price, 10)
        try {
          await newService(this.model)
          this.updateService()
          this.$router.push({ path: '/services'})
        } catch (e) {
          console.error(e)
          this.isLoading = false
          this.alertInvalid = true
          this.messageAlert = 'Une erreur s\'est produite. Veuillez réessayer.'
        }
      }
    }
  },
  validations() {
    return {
      model: {
        title: {
          required
        },
        description: {
          required,
          minLength: minLength(10)
        },
        price: {
          required,
          number
        }
      }
    }
  }
};
</script>
<style lang="scss">
@import "../../styles/variables.css";

.new {
  text-align: center;
  padding: 10rem 0 12rem;
  &__title {
    margin-bottom: 5rem;
  }
  &__alert {
    padding: 2rem;
    margin: 2rem auto;
    display: flex;
  }
  &__form-input {
      margin: 2rem auto;
  }
  &__input {
    font-size: 1.7rem;
    border-radius: 5px;
    border: 1.5px solid var(--bg-footer);
    padding: 0.5rem 1rem;
    &--description {
      width: 30rem;
    }
  }

}
</style>