import Vue from "vue";
import App from "./App.vue";
import Navbar from './components/Navbar.vue'
import HomeSecurity from './components2/HomeSecurity.vue'

import router from "./router";
import store from "./store";

Vue.component('app-nav',Navbar);
Vue.component('userAccount-Security',Home-Security);


Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
