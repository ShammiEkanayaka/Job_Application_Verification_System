import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import vueResource from 'vue-resource';
import BootstrapVue from 'bootstrap-vue'
import swal from 'sweetalert';
/* import { BFormFile } from 'bootstrap-vue';
import { FormCheckboxPlugin } from 'bootstrap-vue';
import { BForm } from 'bootstrap-vue'
Vue.component('b-form', BForm)

Vue.use(FormCheckboxPlugin);
Vue.component('b-form-file', BFormFile); */
import { ValidationObserver, ValidationProvider } from 'vee-validate';
import "./vee-validate";

const url = 'http://localhost:8000/';

//Vue.use(swal)
Vue.use(BootstrapVue)
Vue.use(vueResource);
Vue.config.productionTip = false;
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.visitor)) {
    if (store.getters.profile !== null) {
      next({
        path: '/editUser'
      })
    } else {
      next()
    }
  }
  else if (to.matched.some(record => record.meta.admin)) {
    if (store.getters.profile === 'adminlogd') {
      next()
    } else {
      next({
        path: '/admin/login'
      })
    }
  }
  else if (to.matched.some(record => record.meta.user)) {
    if (store.getters.profile === 'userlogd') {
      next()
    } else {
      next({
        path: '/login'
      })
    }
  } else {
    next() // make sure to always call next()!
  }
})


new Vue({
  router,
  store,
  url,
  swal,
  render: h => h(App)
}).$mount("#app");
