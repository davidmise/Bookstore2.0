<script >
// import { RouterLink, RouterView } from 'vue-router'

import NavigationBar from './components/NavigationBar.vue'
// import ProfileIcon from './components/icons/ProfileIcon.vue'
// import cartIcon from './components/icons/cartIcon.vue'

export default{
  data(){
    return{
      isLogedIn: false
    }
  },

  components:{
    // ProfileIcon,
    NavigationBar,
    // cartIcon,
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
  <NavigationBar></NavigationBar>
  <!-- <div class="container">
    <div class="row">
      <div class="col-md-8">
      
      </div>
      <div class="col-md-2">
        <ProfileIcon msg="profile"></ProfileIcon>
      </div>
      <div class="col-md-2">
        <cartIcon msg="cart"></cartIcon>
      </div>
    </div>
  </div> -->
      
 
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
