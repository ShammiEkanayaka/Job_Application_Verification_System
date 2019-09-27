import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    Index: localStorage.getItem('index') || null,
    Email: localStorage.getItem('email') || null
  },

  mutations: {
    updateIndex(state, payload) {
      state.Index = payload;
    },
    updateEmail(state, payload) {
      state.Email = payload;
    }
  },

  actions: {

  },
  getters: {
    profile(state) {
      if (state.Index === null && state.Email === null)
        return null;

      else if (state.Index !== null)
        return "userlogd";
      
      else if (state.Email !== null)
        return "adminlogd";

      return "some thing wrong";
    }
  }
});
