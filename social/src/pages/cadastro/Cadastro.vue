<template>
  <LoginTemplate>
    <span slot="menuesquerdo">
      <img src="https://static.todamateria.com.br/upload/re/de/redessociaisinteracaopessoas-cke.jpg" alt=""
           class="responsive-img">
    </span>


    <span slot="principal">
      <h2>Cadastro</h2>

      <input type="text" placeholder="Nome" v-model="name">
      <input type="text" placeholder="Email" v-model="email">
      <input type="password" placeholder="Senha" v-model="password">
      <input type="password" placeholder="Confime sua Senha" v-model="password_confirmation">
      <button class="btn" v-on:click="cadastro()">Cadastrar</button>
      <router-link class="btn blue" to="/login">Já Tenho conta!</router-link>
      <span v-if="errors" class="helper-text red-text" data-error="wrong"
            data-success="right">{{ errors }}</span>
    </span>


  </LoginTemplate>
</template>

<script>
import LoginTemplate from "@/templates/LoginTemplate.vue";
import axios from "axios";

export default {
  name: "Cadastro",
  components: {
    LoginTemplate,
  },
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      errors: ''
    }
  },
  methods:{
    cadastro() {
      axios.post('http://localhost/api/register', {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation
      })
        .then(response => {
          console.log(response)
          if (response.data.token) {
            console.log('Cadastro Realizado com SUCESSO!!')
            this.errors = ``;

            sessionStorage.setItem('user', JSON.stringify(response.data.user));
            sessionStorage.setItem('token', JSON.stringify(response.data.token));

            this.$router.push('/');
            // return {success: true, token: response.data.token}
          }
        })
        .catch(e => {
          if (e.response) {
            if (e.response.status === 401) {
              this.errors = 'ERRO. Por favor, tente novamente.';
            } else if (e.response.status === 500) {
              this.errors = 'Ocorreu um erro no servidor. Por favor, tente novamente mais tarde.';
            } else {
              this.errors = 'Ocorreu um erro. Por favor, tente novamente.';
            }
          } else {
            this.errors = 'Não foi possível conectar ao servidor. Por favor, verifique sua conexão com a internet e tente novamente.';
          }
          // console.log(this.errors)
          // console.log('ERRO Login')
          return {success: false, errors: this.errors}
        });
    },
  }
}
</script>

<style scoped>

</style>
