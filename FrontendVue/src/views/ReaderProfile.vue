<template>
    <div>
        this is the Reader's Profile
           <logout-button class="btn btn-outline-success mx-5 mb-4" @logged-out="handleLogout" /> 
    </div>
</template>
<script>
import LogoutButton from '@/components/LogoutButton.vue'; // Import the LogoutButton component
export default{
    components:{
        LogoutButton,
    },
    data(){
        return{
        }
    }
}</script>