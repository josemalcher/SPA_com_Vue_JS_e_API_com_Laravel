<template>
  <span>
    <header>
      <NavBar cor="green darken-1" url="####" logo="Logo so Site Aqui"/>
    </header>
    <main>
      <div class="container">
        <div class="row">
          <GridVue tamanho="4">
            <CardMenuVue>
              <div class="row valign-wrapper">
                <GridVue tamanho="4">
                  <img src="https://materializecss.com/images/yuna.jpg" alt="" class="circle responsive-img">
                  <!-- notice the "circle" class -->
                </GridVue>
                <GridVue tamanho="8">
                  <span class="black-text"><h5>Maria Jozefina</h5>This is a square image</span>
                </GridVue>
              </div>
            </CardMenuVue>
            <CardMenuVue>
              <h3>TESTE</h3>
            </CardMenuVue>
          </GridVue>

          <GridVue tamanho="8">
            <router-view/>
          </GridVue>
        </div>
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
import GridVue from "./components/layout/GridVue.vue";
import CardMenuVue from "./components/layout/CardMenuVue.vue";

export default {
  name: 'App',
  components: {
    NavBar,
    FooterVue,
    GridVue,
    CardMenuVue
  }
}
</script>

<style>

</style>
