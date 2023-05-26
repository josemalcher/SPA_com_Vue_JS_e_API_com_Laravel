<template>
  <LoginTemplate>
    <span slot="menuesquerdo">
      <img src="https://static.todamateria.com.br/upload/re/de/redessociaisinteracaopessoas-cke.jpg" alt=""
           class="responsive-img">
    </span>


    <span slot="principal">
        <h2>Login</h2>

        <input type="text" placeholder="Email" v-model="email">
        <span v-if="errors" class="helper-text red-text" data-error="wrong"
              data-success="right">{{ errors.email }}</span>
        <input type="password" placeholder="Senha" v-model="password">
        <span v-if="errors" class="helper-text red-text" data-error="wrong"
              data-success="right">{{ errors.password }}</span>
      <br>
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
      errors: '',
    }
  },
  methods: {
    login() {
      axios.post('http://localhost/api/login', {
        email: this.email,
        password: this.password
      })
        .then(response => {
          console.log(response)
          if (response.data.token) {
            console.log('LOGIN COM SUCESSO!!')
            this.errors = ``;

            sessionStorage.setItem('user', JSON.stringify(response.data.user));

            return {success: true, token: response.data.token}
          }
        })
        .catch(e => {
          if (e) {
            this.errors = e.response.data.errors;
            console.log(this.errors)
            console.log('ERRO Login')
            return {success: false, errors: this.errors}
          } else {
            console.log('ERRO SERVIDOR')
            return {success: false, errors: ['Erro do servidor']}
          }
        });
    }
    // login() {
    //   axios.post('http://localhost/api/login', {
    //     email: this.email,
    //     password: this.password
    //   })
    //     .then(response => {
    //       console.log(response)
    //       if (response.data.token) {
    //         console.log('LOGIN COM SUCESSO!!')
    //       }
    //     })
    //     .catch(e => {
    //       if (e) {
    //         this.errors = e.response.data.errors;
    //         console.log(this.errors)
    //       } else {
    //         console.log('ERRO SERVIDOR')
    //       }
    //     });
    // },
  }
}
</script>

<style scoped>

</style>
