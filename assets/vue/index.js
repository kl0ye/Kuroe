import Vue from "vue";
import Vuex from "vuex"
import App from "./App";
import router from "./router";
import store from "./store/store.js";
import InlineSvg from 'vue-inline-svg';
import Vuelidate from 'vuelidate';
import cookies from 'browser-cookies';

Vue.use(Vuex)
Vue.component('inline-svg', InlineSvg);
Vue.use(Vuelidate)
Vue.use(cookies)

new Vue({
  components: { App },
  template: "<App/>",
  store: new Vuex.Store(store),
  router
}).$mount("#app");