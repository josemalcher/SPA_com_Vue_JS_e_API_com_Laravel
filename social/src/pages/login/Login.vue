<template>
  <LoginTemplate>
    <span slot="menuesquerdo">
      <img src="https://static.todamateria.com.br/upload/re/de/redessociaisinteracaopessoas-cke.jpg" alt=""
           class="responsive-img">
    </span>


    <span slot="principal">
        <h2>Login</h2>

        <input type="text" placeholder="Email" v-model="email">
        <input type="password" placeholder="Senha" v-model="password">
        <button type="button" class="btn" @click="login()">Entrar</button>
      <router-link class="btn orange" to="/cadastro">Cadastrar</router-link>

    </span>

  </LoginTemplate>
</template>

<script>
import LoginTemplate from "@/templates/LoginTemplate.vue";
import axios from 'axios'
export default {
  name: "Login",
  components: {
    LoginTemplate,
  },
  data() {
    return {
      email: '',
      password: '',
    }
  },
  methods: {
    login() {
      console.log('OKOK')
      axios.post('http://localhost/api/login', {
        email: this.email,
        password: this.password
      }).then(response => {
        console.log(response)
      }).catch(e => {
        this.errors.push(e)
      });


    },
  }
}
</script>

<style scoped>

</style>
