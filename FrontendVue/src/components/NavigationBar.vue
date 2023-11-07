<script >
// import HelloWorld from './components/HelloWorld.vue'
import ProfileIcon from './icons/ProfileIcon.vue'
import cartIcon from './icons/cartIcon.vue'
// import searchBar from '../components/SearchBar.vue'

export default{
    data(){
      return{
        isLogedIn: false
      }
    },
  
    components:{
    ProfileIcon,
    cartIcon,
    // searchBar
    },
  
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

    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#part-b" >MyCV</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">menue</span>
        </button>
        <div class="collapse navbar-collapse row" id="navbarSupportedContent">
          <ul class="navbar-nav row ">
            <li class="nav-item navbar-brand  col">
              <RouterLink to="/" style="color: teal;" class="nav-link active" aria-current="page" href="#experience">Home</RouterLink>
            </li>
            <li class="nav-item  navbar-brand col">
              <RouterLink to="/about" style="color: teal;" class="nav-link" href="#">About</RouterLink>
            </li>
            <!-- responsive -->
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li class="nav-item navbar-brand col">
              <RouterLink to="/books" style="color: teal;" class="nav-link">Books</RouterLink>
            </li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li> -->
            <li class="nav-item navbar-brand col ">
              <RouterLink v-show="!isLogedIn" to="/register" style="color: teal;" class="nav-link">Register</RouterLink>
            </li>
            <li class="nav-item  navbar-brand col">
              <RouterLink v-show="!isLogedIn" to="/login" style="color: teal;" class="nav-link">Signin</RouterLink>
            </li>
            <li class="nav-item navbar-brand col">
              <RouterLink to="/books" style="color: teal;" class="nav-link">Books</RouterLink>
            </li>
            <li class="nav-item navbar-brand col">
              <RouterLink to="/publish" style="color: teal;" class="nav-link">Publish</RouterLink>
            </li>
             <!-- cart icon -->
            <li class="nav-item navbar-brand col">
              <cartIcon msg="cart"></cartIcon>
            </li>
            <!-- profile icon -->
            <li class="nav-item navbar-brand col ">
              <ProfileIcon msg="profile"></ProfileIcon>
            </li>
          </ul>
         
        <!-- <searchBar></searchBar> -->
        </div>
          
      </div>
    </nav>
</template>

