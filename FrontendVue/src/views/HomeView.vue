<template>
  <main>
    <HelloWorld> </HelloWorld>
    <TheWelcome></TheWelcome>
  </main>
</template>

<script>
import TheWelcome from '../components/TheWelcome.vue'
import HelloWorld from '../components/HelloWorld.vue'

export default{
  data() {
    return {
      
    }
  },

  components:{
    HelloWorld,
    TheWelcome
  },

}
</script>