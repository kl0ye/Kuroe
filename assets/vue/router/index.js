import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home";
import Services from "../views/Services";
import RendezVous from "../views/RendezVous";
import Contact from "../views/Contact";

Vue.use(VueRouter);

export default new VueRouter({
  mode: "history",
  routes: [
    { path: "/home", component: Home },
    { path: "/services", component: Services },
    { path: "/rendez-vous", component: RendezVous },
    { path: "/contact", component: Contact }
  ]
});
