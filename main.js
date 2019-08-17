import Vue from "vue";
import App from "./App.vue";
import Navbar from './components/Navbar.vue';
import Home from './components/Home.vue'


Vue.component('app-nav',Navbar);
Vue.component('app-home',Home)



Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");