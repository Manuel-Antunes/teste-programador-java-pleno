<script>
import Navbar from './components/Navbar.vue';
export default {
  name: "App",
  components: {
    Navbar
  },
  data() {
    return {
      logo_src: "./assets/logo.png",
    }
  }
}
</script>

<template>
  <Navbar :logo="logo_src"/>
  <router-view />
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
