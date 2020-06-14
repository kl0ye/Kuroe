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
    setIsConnect ({commit}, payload) {
      commit('SET_IS_CONNECT', payload)
    },
    deleteIsConnect ({commit}) {
      commit('DELETE_IS_CONNECT')
    }
  },
  mutations: {
    SET_SERVICES (state, services) {
      Vue.set(state, 'Services', services)
    },
    UPDATE_SERVICE (state, service) {
      Vue.set(state, 'Services', service)
    },
    SET_IS_CONNECT (state, payload) {
      Vue.set(state, 'isConnect', payload)
    },
    DELETE_IS_CONNECT (state) {
      Vue.set(state, 'isConnect', false)
    }
  },
  getters: {
    getServices: state => state.Services ? state.Services : null,
    getIsConnect: state => state.isConnect ? state.isConnect : null
  },
  state: {
    Services: null,
    isConnect: false
  }
}
