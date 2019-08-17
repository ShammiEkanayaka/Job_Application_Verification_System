import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/Home.vue";
import EditProfile from "./components/EditProfile.vue";
import ActvityLog from "./components/ActvityLog.vue";

const router = new VueRouter({
  routes: [
    { path: "/home", component: Home },
    { path: "/editProfile", component: EditProfile },
    { path: "/activityLog", component: ActvityLog }

    ]

    
})

export default router;
