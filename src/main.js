import Vue from 'vue'
import App from './App.vue'
import Router from './routes.js'
import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);

new Vue({
  el: '#app',
  render: h => h(App),
  router:Router
})
