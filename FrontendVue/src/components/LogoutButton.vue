<template>
    <button @click="logout">Logout</button>
  </template>
  
  <script>
  export default {
    methods: {
      logout() {
        // Perform logout logic here, e.g., clear user data, tokens, etc.
        // You can also remove the user_id from local storage here
        localStorage.removeItem('user_id');
        this.$router.push({ name: 'login' });
        
        // Emit an event to notify the parent component that the user has logged out
        this.$emit('logged-out');
      },

        // handleLogout() {
        //   // Handle any additional logout actions here (if needed)
        //   // e.g., redirect to the login page
        //   this.$router.push({ name: 'login' });
        // },
    },
  };
  </script>
  