<template>
  <span>
    <header>
      <NavBar cor="green darken-1" url="####" logo="Logo so Site Aqui"/>
    </header>
    <main>
      <div class="container">
        <router-view/>
      </div>
    </main>
    <footer>
      <FooterVue cor="green darken-1" logo="Logo so Site Aqui" descricao="descrição do site">
            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
      </FooterVue>
    </footer>
  </span>
</template>

<script>
import NavBar from "./components/layout/NavBar.vue";
import FooterVue from "./components/layout/FooterVue.vue";

export default {
  name: 'App',
  components: {
    NavBar,
    FooterVue

  }
}
</script>

<style>

</style>
