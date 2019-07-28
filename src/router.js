import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home.vue";
import Login_Page from "./views/Login_Page.vue";
import Register_Page from "./views/Register_Page";
import Users from "./views/Users.vue"

Vue.use(Router);

export default new Router({
  mode: "history",
  routes: [
    {
      path: "/login",
      name: "login",
      component: Login_Page
    },
    {
      path: "/",
      name: "home",
      component: Home
    },
    {
      path: "/register",
      name: "register",
      component: Register_Page
    },
    {
      path: "/users",
      name: "users",
      component: Users
    },
    {
      path: "/about",
      name: "about",
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () =>
        import(/* webpackChunkName: "about" */ "./views/About.vue")
    }
  ]
});
