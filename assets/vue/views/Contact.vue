<template>
  <div class="contact">
    <h2 class="contact__title">
      Nous contacter
    </h2>

    <div class="row offset-3 col-6">
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
                type="text"
                class="form-control contact__form-input"
                placeholder="Email"
                required
              >
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="adresse">Adresse</label>
          <input
            id="adresse"
            v-model="model.adresse"
            type="text"
            class="form-control contact__form-input"
            placeholder="Adresse"
          >
        </div>
        <div class="form-group">
          <label for="adresse2">Complément d'adresse</label>
          <input
            id="adresse2"
            v-model="model.adresse2"
            type="text"
            class="form-control contact__form-input"
            placeholder="Complément d'adresse"
          >
        </div>
        <div class="form-row">
          <div class="col-md-2 mb-3">
            <label for="batiment">Bâtiment</label>
            <input
              id="batiment"
              v-model="model.batiment"
              type="text"
              class="form-control contact__form-input"
              placeholder="Batiment"
            >
          </div>
          <div class="col-md-2 mb-3">
            <label for="etage">Etage</label>
            <input
              id="etage"
              v-model="model.etage"
              type="text"
              class="form-control contact__form-input"
              placeholder="Etage"
            >
          </div>
          <div class="col-md-5 mb-3">
            <label for="ville">Ville</label>
            <input
              id="ville"
              v-model="model.ville"
              type="text"
              class="form-control contact__form-input"
              placeholder="Ville"
              required
            >
          </div>
          <div class="col-md-3 mb-3">
            <label for="postal">Code postal</label>
            <input
              id="postal"
              v-model="model.postal"
              type="text"
              class="form-control contact__form-input"
              placeholder="Code postal"
              required
            >
          </div>
        </div>
        <div class="form-group">
          <label for="message">Votre message</label>
          <textarea
            id="message"
            v-model="model.message"
            class="form-control contact__form-input"
            rows="5"
          />
        </div>
        <button
          class="btn btn-secondary contact__form-btn"
          :class="{ 'disabled' : isDisabled }"
          @click="sendForm"
        >
          Envoyer
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import { formulaireContact } from '../services/api'

export default {
  name: "Contact",
  data () {
    return { 
      isDisabled: true,
      model: {
        nom: '',
        prenom: '',
        phone: '',
        email: '',
        adresse: '',
        adresse2: '',
        etage: '',
        batiment: '',
        ville: '',
        postal: '',
        message: ''
      }
    }
  },
  methods: {
    async sendForm (e) {
      console.log(this.model)
      e.preventDefault()
      let contact = await formulaireContact(this.model)
      console.log('contact', contact)
    }
  }
};
</script>

<style lang="scss">
@import "../../styles/variables.css";
.contact {
  margin: 5rem auto;
  &__title {
    font-size: 5rem;
    font-family: 'Lobster';
    text-align: center;
    margin: 2rem 0;    
  }
  &__form {
    display: flex;
    flex-direction: column;
    &-input {
      font-size: 1.2rem;
    }
    &-btn {
      font-size: 1.5rem;
    }
  }
}
</style>

