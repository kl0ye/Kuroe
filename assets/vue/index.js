import Vue from "vue";
import App from "./App";
import router from "./router";
import InlineSvg from 'vue-inline-svg';

Vue.component('inline-svg', InlineSvg);

new Vue({
  components: { App },
  template: "<App/>",
  router
}).$mount("#app");