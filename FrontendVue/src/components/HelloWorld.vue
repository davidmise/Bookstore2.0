<script setup>
defineProps({
  msg: {
    type: String,
    required: true
  }
})
</script>

<template>
  <div class="greetings">
    <h1 class="green">{{ msg }}</h1>
    <span class="h3">
      Read from the world's Top writters
      <!-- <a href="https://vitejs.dev/" target="_blank" rel="noopener">Vite</a> +
      <a href="https://vuejs.org/" target="_blank" rel="noopener">Vue 3</a>. -->
    </span>
    <!-- Trigger the modal -->


  </div>
  
  <div class="input-group rounded ">
    <input type="search" class="form-control m-3 rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
    <span class="input-group-text border-0" id="search-addon">
      <i class="fas fa-search"></i>
    </span>
    <!-- user profile icon -->
   <span>
      <ProfileIcon msg="profile" ></ProfileIcon>
   </span> 
  </div>
  
</template>
<script>

import ProfileIcon from './icons/ProfileIcon.vue';
// import ProfileIcon from './icons/ProfileIcon.vue';

  export default {
     
      data() {
        return {
          username: '', // User data
        };
      },
      
  };
</script>
<style scoped>
h1 {
  font-weight: 500;
  font-size: 2.6rem;
  position: relative;
  top: -10px;
}

h3 {
  font-size: 1.2rem;
}

.greetings h1,
.greetings h3 {
  text-align: center;
}

@media (min-width: 1024px) {
  .greetings h1,
  .greetings h3 {
    text-align: left;
  }
}
</style>
