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
import adminlogin from "./views/Login/AdminLogin";

Vue.use(Router);

export default new Router({
  mode: "history",
  routes: [
    {
      path: "/login",
      name: "login",
      component: Login_Page,
      meta: {
        visitor: true
      }
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
      component: Users,
      meta: {
        admin: true
      }
    },
    {
      path: "/add",
      name: "add",
      component: Add,
      meta: {
        admin: true
      }
    },
    {
      path: "/edit/:index",
      name: "edit",
      component: Edit,
      meta: {
        admin: true
      }
    },
    {
      path: "/editUser",
      name: "editUser",
      component: Edituser,
      meta: {
        user: true
      }
    },
    {
      path: "/guest/:index",
      name: "guest",
      component: Guest
    },
    {
      path: "/admin/login",
      name: "adminlogin",
      component: adminlogin,
      meta: {
        visitor: true
      }
    }
  ]
});
