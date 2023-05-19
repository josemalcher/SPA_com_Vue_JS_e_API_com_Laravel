<template>
  <span>
    <header>
      <NavBar cor="green darken-1" url="####" logo="Logo so Site Aqui"/>
    </header>
    <main>
      <div class="container">
        <div class="row">
          <GridVue tamanho="6">
            <CardMenuVue>

            </CardMenuVue>

          </GridVue>

          <GridVue tamanho="6">

            <slot/>

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
import NavBar from "@/components/layout/NavBar.vue";
import FooterVue from "@/components/layout/FooterVue.vue";
import GridVue from "@/components/layout/GridVue.vue";
import CardMenuVue from "@/components/layout/CardMenuVue.vue";


export default {
  name: 'LoginTemplate',
  components: {
    GridVue,
    NavBar,
    FooterVue,
    CardMenuVue,
  }
}
</script>

<style>

</style>
