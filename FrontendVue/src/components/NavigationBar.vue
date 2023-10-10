<script >
// import HelloWorld from './components/HelloWorld.vue'
export default{
    data(){
      return{
        isLogedIn: false
      }
    },
  
    // components:{
    //   HelloWorld
    // },
  
    created(){
      this.chekUser()
    },


    watch: {
        '$route'() {
        this.isLogedIn = localStorage.getItem('user_id') !== null;
        }
    },
  
    methods: {
      chekUser(){
        var user = localStorage.getItem('user_id')
        this.isLogedIn = user !== null;
      }
    }, 
  }
  </script>
  
<template>
    <nav>
        <RouterLink to="/"  style="color: teal;">Home</RouterLink>
        <RouterLink to="/about"  style="color: teal;">About</RouterLink>
        <RouterLink v-show="!isLogedIn" to="/register" style="color: teal;">Register</RouterLink>
        <RouterLink v-show="!isLogedIn" to="/login" style="color: teal;">Login</RouterLink>
        <RouterLink to="/books" style="color: teal;">Books</RouterLink>
        <RouterLink to="/publish" style="color: teal;">Publish</RouterLink>
    </nav>
</template>

<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>