<template>
    <div>
        this is the cart page
    </div>
    <LogoutButton style="border-radius: 20px;" class="btn btn-outline-success ms-1" @logged-out="handleLogout" /> 
</template>
<script>
import LogoutButton from '@/components/LogoutButton.vue'; 
export default{
    data() {
        return {
            
        }
    },
    components:{
        LogoutButton
    }
}
</script>
