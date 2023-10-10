// store.js

import Vue from 'vue';
import Vuex from 'vuex';
import authModule from './store/auth';

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    auth: authModule, // Add the auth module to the store
    // Add other modules if needed
  },
});

export default store;
