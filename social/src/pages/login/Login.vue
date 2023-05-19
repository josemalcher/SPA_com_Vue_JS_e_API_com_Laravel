<template>
  <LoginTemplate>
    <span slot="menuesquerdo">
      <img src="https://static.todamateria.com.br/upload/re/de/redessociaisinteracaopessoas-cke.jpg" alt="" class="responsive-img">
    </span>


    <span slot="principal">
      <h2>Login</h2>

      <input type="text" placeholder="Email" value="">
      <input type="password" placeholder="Senha" value="">
      <button type="button" class="btn">Entrar</button>
    </span>

  </LoginTemplate>
</template>

<script>
import LoginTemplate from "@/templates/LoginTemplate.vue";
import CardConteudoVue from '@/components/social/CardConteudoVue.vue';
import CardDetalheVue from '@/components/social/CardDetalheVue.vue';
import PublicarConteudoVue from "@/components/social/PublicarConteudoVue.vue";

export default {
  name: "Login",
  components: {
    LoginTemplate,
    CardConteudoVue,
    CardDetalheVue,
    PublicarConteudoVue
  }
}
</script>

<style scoped>

</style>
