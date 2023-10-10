// store/auth.js

const state = {
    user: null,
    isAuthenticated: false,
  };
  
  const mutations = {
    SET_USER(state, user) {
      state.user = user;
    },
    SET_AUTHENTICATED(state, isAuthenticated) {
      state.isAuthenticated = isAuthenticated;
    },
  };
  
  const actions = {
    login({ commit }, user) {
      // Perform login logic here
      // Once authenticated, commit mutations to set user and authentication status
      commit('SET_USER', user);
      commit('SET_AUTHENTICATED', true);
    },
    logout({ commit }) {
      // Perform logout logic here
      // Clear user data and set isAuthenticated to false
      commit('SET_USER', null);
      commit('SET_AUTHENTICATED', false);
    },
  };
  
  const getters = {
    getUser: state => state.user,
    isAuthenticated: state => state.isAuthenticated,
  };
  
  export default {
    state,
    mutations,
    actions,
    getters,
  };
  