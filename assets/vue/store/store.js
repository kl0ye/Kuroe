import Vue from 'vue'
import { getAllServices } from '../services/api'

export default {
  actions: {
    setServices ({commit}, payload) {
      commit('SET_SERVICES', payload)
    },
    async updateService ({commit}) {
      let payload = await getAllServices()
      commit('UPDATE_SERVICE', payload.data)
    },
    setUser ({commit}, payload) {
      commit('SET_USER', payload)
    },
    deleteUser ({commit}) {
      commit('DELETE_USER')
    }
  },
  mutations: {
    SET_SERVICES (state, services) {
      Vue.set(state, 'Services', services)
    },
    UPDATE_SERVICE (state, service) {
      Vue.set(state, 'Services', service)
    },
    SET_USER (state, user) {
      localStorage.setItem('CONNEXION', user);
      Vue.set(state, 'User', user)
    },
    DELETE_USER (state) {
      Vue.set(state, 'User', null)
      localStorage.removeItem('CONNEXION');
    }
  },
  getters: {
    getServices: state => state.Services ? state.Services : null,
    getUser: state => state.User ? state.User : null
  },
  state: {
    Services: null,
    User: null
  }
}
