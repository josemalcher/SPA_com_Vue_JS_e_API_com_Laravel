<template>
  <LoginTemplate>
    <span slot="menuesquerdo">
      <img src="https://static.todamateria.com.br/upload/re/de/redessociaisinteracaopessoas-cke.jpg" alt=""
           class="responsive-img">
    </span>


    <span slot="principal">
      <h2>Cadastro</h2>

      <input type="text" placeholder="Nome" value="">
      <input type="text" placeholder="Email" value="">
      <input type="password" placeholder="Senha" value="">
      <input type="password" placeholder="Confime sua Senha" value="">
      <router-link class="btn" to="/cadastro">Cadastrar</router-link>
      <router-link class="btn blue" to="/login">Já Tenho conta!</router-link>
    </span>


  </LoginTemplate>
</template>

<script>
import LoginTemplate from "@/templates/LoginTemplate.vue";

export default {
  name: "Cadastro",
  components: {
    LoginTemplate,
  }
}
</script>

<style scoped>

</style>
