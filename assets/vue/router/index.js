import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home";
import Services from "../views/Services";
import AddService from "../views/AddService";
import MonoService from "../views/MonoService";
import Realisations from "../views/Realisations";
import Contact from "../views/Contact";
import Connexion from "../views/Connexion";

Vue.use(VueRouter);

export default new VueRouter({
  mode: "history",
  routes: [
    { path: "/", component: Home },
    { path: "*", redirect: '/' },
    { path: "/services", component: Services },
    { path: "/ajouter-service", component: AddService },
    { path: "/services/mono-service", component: MonoService },
    { path: "/realisations", component: Realisations },
    { path: "/contact", component: Contact },
    { path: "/connexion", component: Connexion }
  ]
});
