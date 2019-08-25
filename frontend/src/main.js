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

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount("#app");
