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
 
  <RouterView />
</template>


