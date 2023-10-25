<template>
     <!-- user profile icon -->
   <span @click="takeToProfile"> 
    <svg  class="mx-auto my-3 col-12 " xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"  viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
  </svg>
  </span> 
</template>

<script>
export default{
    methods:{
        chekUser(){
        
 
    },

        takeToProfile(){
            var user_role = localStorage.getItem('user_role');
                if(user_role =='author'){
                    // Redirect to author's profile page
                    this.$router.push({ name: 'author.profile' });
                }
                else{
                    // Redirect to reader's profile page
                    this.$router.push({ name: 'reader.profile' });
                }
        }
    }
};
</script>