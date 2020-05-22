import Vue from 'vue'

export default {
  actions: {
    setServices ({commit}, payload) {
      commit('SET_SERVICES', payload)
    }
  },
  mutations: {
    SET_SERVICES (state, services) {
      Vue.set(state, 'Services', services)
    }
  },
  getters: {
    getServices: state => state.Services ? state.Services : null
  },
  state: {
    Services: null
  }
}
