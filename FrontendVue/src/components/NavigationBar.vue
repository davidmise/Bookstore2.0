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
    <!-- <nav>

        <RouterLink to="/"  style="color: teal;">Home</RouterLink>
        <RouterLink to="/about"  style="color: teal;">About</RouterLink>
        <RouterLink v-show="!isLogedIn" to="/register" style="color: teal;">Register</RouterLink>
        <RouterLink v-show="!isLogedIn" to="/login" style="color: teal;">Login</RouterLink>
        <RouterLink to="/books" style="color: teal;">Books</RouterLink>
        <RouterLink to="/publish" style="color: teal;">Publish</RouterLink>
    </nav> -->

    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#part-b" >MyCV</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">menue</span>
        </button>
        <div class="collapse navbar-collapse row" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-1 row col-8">
            <li class="nav-item navbar-brand ">
              <RouterLink to="/" style="color: teal;" class="nav-link active" aria-current="page" href="#experience">Home</RouterLink>
            </li>
            <li class="nav-item  navbar-brand ">
              <RouterLink to="/about" style="color: teal;" class="nav-link" href="#">About</RouterLink>
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li> -->
            <li class="nav-item navbar-brand  ">
              <RouterLink v-show="!isLogedIn" to="/register" style="color: teal;" class="nav-link">Register</RouterLink>
            </li>
            <li class="nav-item  navbar-brand ">
              <RouterLink v-show="!isLogedIn" to="/login" style="color: teal;" class="nav-link">Signin</RouterLink>
            </li>
            <li class="nav-item navbar-brand">
              <RouterLink to="/books" style="color: teal;" class="nav-link">Books</RouterLink>
            </li>
            <li class="nav-item navbar-brand">
              <RouterLink to="/publish" style="color: teal;" class="nav-link">Publish</RouterLink>
            </li>
          </ul>
          <!-- cart icon -->
          <div class="nav-item navbar-brand col-">
            <cartIcon msg="cart"></cartIcon>
          </div>
          <!-- profile icon -->
          <div class="nav-item navbar-brand col-">
            <ProfileIcon msg="profile"></ProfileIcon>
          </div>
        <!-- <searchBar></searchBar> -->
        </div>
          
      </div>
    </nav>
</template>

<!-- <style scoped>

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
</style> -->
