import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import vueResource from 'vue-resource';
import { BFormFile } from 'bootstrap-vue';
import { FormCheckboxPlugin } from 'bootstrap-vue';


Vue.use(FormCheckboxPlugin);
Vue.component('b-form-file', BFormFile);
Vue.use(vueResource);
Vue.config.productionTip = false;

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.visitor)) {
    if (store.getters.profile!==null) {
      next({
        path: '/'
      })
    } else {
      next()
    }
  }
  else if (to.matched.some(record => record.meta.admin)) {
    if (store.getters.profile==='adminlogd') {
      next()
    } else {
      next({
        path: '/admin/login'
      })
    }
  }
  else if (to.matched.some(record => record.meta.user)) {
    if (store.getters.profile==='userlogd') {
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
  render: h => h(App)
}).$mount("#app");
