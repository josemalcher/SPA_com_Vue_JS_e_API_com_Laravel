<template>
  <span>
    <header>
      <NavBar cor="green darken-1" url="/" logo="Logo so Site Aqui">
        <li v-if="!usuario"><router-link to="/login">Login</router-link></li>
        <li v-if="!usuario"><router-link to="/cadastro">Cadastre-se</router-link></li>
        <li v-if="usuario"><router-link to="/perfil">{{ usuario.name }}</router-link></li>
        <li v-if="usuario"><a v-on:click="sair()">Sair</a></li>
      </NavBar>
    </header>
    <main>
      <div class="container">
        <div class="row">
          <GridVue tamanho="4">
            <CardMenuVue>
              <slot name="menuesquerdo"/>
            </CardMenuVue>
          </GridVue>

          <GridVue tamanho="8">
            <slot name="principal"/>
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
  name: 'SiteTemplate',
  components: {
    GridVue,
    NavBar,
    FooterVue,
    CardMenuVue,
  },
  data() {
    return {
      usuario: false
    }
  },
  created() {
    let usuario = sessionStorage.getItem('user');
    if (usuario) {
      this.usuario = JSON.parse(usuario);
      // console.log(usuario)
    }else{
      this.$router.push('/login');
    }
  },
  methods: {
    sair() {
      sessionStorage.clear();
      this.usuario = false;
      this.$router.push('/login');
    },
  }
}
</script>

<style>

</style>
