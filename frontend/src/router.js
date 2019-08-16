import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home.vue";
import Login_Page from "./views/Login/Login_Page.vue";
import Register_Page from "./views/Login/Register_Page";
import Users from "./views/Admin/Users.vue";
import Add from "./views/Admin/Add_Users.vue";
import Edit from "./views/Admin/Edit_User.vue";
import Edituser from "./views/User/Edit_User.vue";
import Guest from "./views/User/Guest_view.vue";

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
      path: "/add",
      name: "add",
      component: Add
    },
    {
      path: "/edit/:index",
      name: "edit",
      component: Edit
    },
    {
      path: "/editUser/:index",
      name: "editUser",
      component: Edituser
    },
    {
      path: "/guest/:index",
      name: "guest",
      component: Guest
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
