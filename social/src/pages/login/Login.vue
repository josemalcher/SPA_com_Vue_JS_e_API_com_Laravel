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
      <br>
      <button type="button" class="btn" @click="login()">Entrar</button>
      <router-link class="btn orange" to="/cadastro">Cadastrar</router-link>
      <span v-if="errors" class="helper-text red-text" data-error="wrong"
            data-success="right">{{ errors }}</span>

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

            this.$router.push('/');
            return {success: true, token: response.data.token}
          }
        })
        .catch(e => {
          if (e.response) {
            if (e.response.status === 401) {
              this.errors = 'Credenciais inválidas. Por favor, tente novamente.';
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
    //         this.errors = ``;
    //
    //         sessionStorage.setItem('user', JSON.stringify(response.data.user));
    //
    //         this.$router.push('/');
    //         return {success: true, token: response.data.token}
    //       }
    //     })
    //     .catch(e => {
    //       // console.log(JSON.stringify(e.response.data.errors));
    //       if (e) {
    //         this.errors = JSON.stringify(e.response.data.errors);
    //         console.log(this.errors)
    //         console.log('ERRO Login')
    //         return {success: false, errors: this.errors}
    //       } else {
    //         console.log('ERRO SERVIDOR')
    //         return {success: false, errors: ['Erro do servidor']}
    //       }
    //     });
    // }
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
