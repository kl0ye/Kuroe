<template>
  <div>
    <loading
      loader="dots"
      :active="isLoading"
      :color="color"
      :height="size"
      :width="size"
    />
    <div
      v-if="!getUser"
      class="login"
    >
      <h2 class="title">
        Se connecter
      </h2>
      <div
        v-if="alertInvalid"
        class="login__alert col-md-5 col-10 alert alert-danger"
        role="alert"
      >
        <inline-svg
          class="login__alert-svg mr-3"
          :src="require('../../img/svg/alert.svg').default"
          :width="small" 
          :height="small"
        />
        <p>Votre email ou votre mot de passe semble incorrect. Veuillez réessayer.</p>
      </div>
      <div class="login__user">
        <inline-svg
          class="login__user-svg"
          :src="require('../../img/svg/user.svg').default"
          :width="big" 
          :height="big"
          color="white"
        />
      </div>
      <form class="login__form">
        <div class="login__form-input pt-3">
          <label for="email" />
          <input
            id="email"
            v-model="model.email"
            name="email"
            type="email"
            class="login__input"
            placeholder="Email"
            required
          >
        </div>
        <div class="login__form-input">
          <label for="password" />
          <input
            id="password"
            v-model="model.password"
            name="password"
            type="password"
            class="login__input"
            placeholder="Mot de passe"
            required
          >
        </div>
        <button
          type="submit"
          class="btn btn-secondary contact__form-btn"
          :class="{ 'contact__form-btn-disabled' : !isValid }"
          @click="sendForm"
        >
          Connexion
        </button>
      </form>
    </div>
    <div
      v-else
      class="login"
    >
      <h2 class="title login__title">
        Bienvenue 
      </h2>
      <div class="login__interface">
        <div class="login__interface-vignette mr-5">
          <div
            class="login__goto"
          >
            <inline-svg
              class="login__goto-svg"
              :src="require('../../img/svg/plus.svg').default"
              :width="big" 
              :height="big"
              color="white"
              @click="goTo('/ajouter-service')"
            />
          </div>
          <p class="login__text">
            Ajouter un service
          </p>
        </div>
        <div class="login__interface-vignette">
          <div
            class="login__goto"
          >
            <inline-svg
              class="login__goto-svg"
              :src="require('../../img/svg/eye.svg').default"
              :width="big" 
              :height="big"
              color="white"
              @click="goTo('/services')"
            />
          </div>
          <p class="login__text">
            Voir tous mes services
          </p>
        </div>
      </div>
      <button
        class="btn btn-secondary contact__form-btn login__btn"
        @click="logout"
      >
        Déconnexion
      </button>
    </div>
  </div>
</template>

<script>
import { required, minLength, email } from 'vuelidate/lib/validators'
import { auth, logout } from '../services/api'
import { mapActions, mapGetters } from 'vuex'
import Loading from "vue-loading-overlay";
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
  name: 'Connexion',
  components: {
    Loading
  },
  data() {
    return {
      isValid: false,
      alertInvalid: false,
      small:20,
      big: 50,
      model: {
        email: null,
        password: null
      },
      connect: false,
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
      return (!this.$v.model.email.$invalid && !this.$v.model.password.$invalid)
    }
  },
  watch: {
    isValidForm (value) {
      if (this.alertInvalid) { this.alertInvalid = false }
      this.isValid = value
    }
  },
  methods: {
    ...mapActions([
      'setUser',
      'deleteUser'
    ]),
    clearForm () {
      this.model = {
        email: null,
        password: null
      }
    },
    async sendForm (e) {
      this.isLoading = true
      if (this.alertInvalid) this.alertInvalid = false
      if (this.isValid) {
        e.preventDefault()
        let form = new FormData(document.querySelector('.login__form'))
        try {
          await auth(form)
          this.setUser(this.model.email)
        } catch (e) {
          console.error(e)
          this.alertInvalid = true
        } finally {
          this.clearForm()
          this.isLoading = false
        }

      }
    },
    async logout () {
      this.isLoading = true
      await logout()
      this.deleteUser()
      this.isLoading = false
    },
    goTo (route) {
      this.$router.push(route)
    }
  },
  validations() {
    return {
      model: {
        email: {
          required,
          email
        },
        password: {
          required,
          minLength: minLength(6)
        }
      }
    }
  }
};
</script>
<style lang="scss">
@import "../../styles/variables.css";

.login {
  text-align: center;
  padding: 10rem 0 12rem;
  &__title {
    margin-bottom: 3rem;
  }
  &__alert {
      padding: 2rem;
      margin: 2rem auto;
      display: flex;
  }
  &__form-input {
      margin: 1rem auto;
  }
  &__input {
      font-size: 1.7rem;
      border-radius: 5px;
      border: 1.5px solid var(--bg-footer);
      padding: 0.5rem 1rem;
  }
  &__btn {
    margin-top: 0;
  }
  &__user, &__goto {
      border-radius: 50%;
      background-color: var(--kuroe-light-blue);
      padding: 2rem;
      width: 10rem;
      margin: auto;

  }
  &__interface {
    margin: 5rem 0;
    display: flex;
    justify-content: center;
    align-items: center;
    &-vignette {
      display: flex;
      align-items: center;
      flex-direction: column;
    }
  }
  &__goto-svg {
    transition: transform 2s;
    &:hover {
      transform: scale(1.1);
    }
  }
  &__goto:hover {
    cursor: pointer;
    background-color: var(--kuroe-dark-blue);
  }
  &__text {
    margin: 2rem;
    font-size: 1.5rem;
    font-weight: bold;
  }
}
</style>