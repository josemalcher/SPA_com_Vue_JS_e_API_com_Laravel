<template>
  <div id="app">
    <NavBar cor="green" url="####" logo="Logo so Site Aqui" />

    <router-view/>
  </div>
</template>

<script>
import NavBar from "./components/layout/NavBar.vue";

export default {
  name: 'App',
  components: {
    NavBar

  }
}
</script>

<style>

</style>
