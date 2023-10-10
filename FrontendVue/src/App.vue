<script >
// import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
import NavigationBar from './components/NavigationBar.vue'
// import navigation from './components/NavigationBar.vue'

export default{
  data(){
    return{
      isLogedIn: false
    }
  },

  components:{
    HelloWorld,
    NavigationBar
},

  created(){
    this.chekUser()
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
  <header>
    <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />
    
    <div class="wrapper">
      <HelloWorld msg="Online Bookstore!" /> 
      <NavigationBar></NavigationBar>            
    
    </div>
    
  </header>

  <RouterView />
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

}
</style>
