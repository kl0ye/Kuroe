<template>
  <div class="contact">
    <h2 class="contact__title">
      Nous contacter
    </h2>

    <div class="row">
      <div
        v-if="sendFormOk"
        class="contact__alert offset-2 col-8 alert alert-success"
        role="alert"
      >
        Votre demande de contact à été prise en compte. Vous receverez une reponse sous 24h.
      </div>
      <div
        v-if="alertInvalid"
        class="contact__alert offset-2 col-8 alert alert-danger"
        role="alert"
      >
        Tous les champs du formulaire ne sont pas remplis.
      </div>
      <form
        class="needs-validation offset-2 col-8 contact__form"
      >
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="nom">Nom</label>
            <input
              id="nom"
              v-model="model.nom"
              type="text"
              class="form-control contact__form-input"
              placeholder="Nom"

              required
            >
          </div>
          <div class="col-md-6 mb-3">
            <label for="prenom">Prenom</label>
            <input
              id="prenom"
              v-model="model.prenom"
              type="text"
              class="form-control contact__form-input"
              placeholder="Prenom"
              required
            >
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="phone">Téléphone</label>
            <input
              id="phone"
              v-model="model.phone"
              type="phone"
              class="form-control contact__form-input"
              placeholder="Numéro de téléphone"
              required
            >
          </div>
          <div class="col-md-6 mb-3">
            <label for="email">Email</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span
                  class="input-group-text"
                >@</span>
              </div>
              <input
                id="email"
                v-model="model.email"
                type="email"
                class="form-control contact__form-input"
                placeholder="Email"
                required
              >
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="message">Votre message</label>
          <textarea
            id="message"
            v-model="model.message"
            class="form-control contact__form-input"
            rows="5"
            required
          />
        </div>
        <div
          class="btn btn-secondary contact__form-btn"
          :class="{ 'contact__form-btn-disabled' : !isValid }"
          @click="sendForm"
        >
          Envoyer
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { formulaireContact } from '../services/api'
import { required, minLength, numeric, email } from 'vuelidate/lib/validators'

export default {
  name: "Contact",
  data () {
    return {
      alertInvalid: false,
      isValid: false,
      model: {
        nom: null,
        prenom: null,
        phone: null,
        email: null,
        message: null
      },
      sendFormOk: false
    
    }
  },
  computed: {
    isValidForm () {
      return (!this.$v.model.nom.$invalid && !this.$v.model.prenom.$invalid && !this.$v.model.phone.$invalid && !this.$v.model.email.$invalid && !this.$v.model.message.$invalid)
    }
  },
  watch: {
    isValidForm (value) {
      if (this.alertInvalid) { this.alertInvalid = false }
      this.isValid = value
    }
  },
  methods: {
    clearForm () {
      this.model = {
        nom: null,
        prenom: null,
        phone: null,
        email: null,
        message: null
      }
    },
    async sendForm () {
      if (this.isValid) {
        await formulaireContact(this.model)
        this.clearForm()
        this.sendFormOk = true
      } else {
        if (this.sendFormOk) { this.sendFormOk = false }
        this.alertInvalid = true
      }
    }
  },
  validations() {
    return {
      model: {
        nom: {
          required,
          minLength: minLength(2)
        },
        prenom: {
          required,
          minLength: minLength(2)
        },
        phone: {
          required,
          numeric,
          minLength: minLength(10)
        },
        email: {
          required,
          email
        },
        message: {
          required,
          minLength: minLength(10)
        }
      }
    }
  }
};
</script>

<style lang="scss">
@import "../../styles/variables.css";
.contact {
  margin: 5rem 25%;
  background-color: var(--vignette-blue-light);
  &__title {
    font-size: 5rem;
    font-family: 'Lobster';
    text-align: center;
    margin: 2rem 0;
    padding: 2rem 0;
  }
  &__alert {
    padding: 2rem;
    margin-bottom: 2rem;
    margin-top: -2rem;
  }
  &__form {
    display: flex;
    flex-direction: column;
    margin-bottom: 3rem;
    &-input {
      font-size: 1.2rem;
    }
    &-btn {
      margin-top: 3rem;
      font-size: 1.5rem;
      z-index: 1;
      border-radius: 50rem;
      border: 2px solid var(--font-grey);
      color: #FFF;
      font-weight: bold;
      padding: 0.5rem 2rem;
      background-color: var(--font-grey);
    }
    &-btn:hover {
      border: 2px solid var(--kuroe-dark-blue);
      background-color: var(--kuroe-dark-blue);
    }
    &-btn-disabled {
      cursor: not-allowed;
    }
    &-btn-disabled:hover {
      cursor: not-allowed;
      border: 2px solid var(--font-grey);
      background-color: var(--font-grey);
    }
  }
  &__bground {
    opacity: .2;
    position: absolute;
    z-index: -1;
  }
}
</style>

