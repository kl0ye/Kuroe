import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home";
import Services from "../views/Services";
import MonoService from "../views/MonoService";
import Realisations from "../views/Realisations";
import Contact from "../views/Contact";

Vue.use(VueRouter);

export default new VueRouter({
  mode: "history",
  routes: [
    { path: "/home", component: Home },
    { path: "/services", component: Services },
    { path: "/services/mono-service", component: MonoService },
    { path: "/realisations", component: Realisations },
    { path: "/contact", component: Contact }
  ]
});
