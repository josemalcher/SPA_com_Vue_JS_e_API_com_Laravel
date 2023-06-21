<template>
  <SiteTemplate>
    <span slot="menuesquerdo">
      <img src="https://static.todamateria.com.br/upload/re/de/redessociaisinteracaopessoas-cke.jpg" alt=""
           class="responsive-img">
    </span>


    <span slot="principal">
      <h2>Perfil</h2>

      <input type="text" placeholder="Nome" v-model="name">
      <input type="text" placeholder="Email" v-model="email">

      <div class="file-field input-field">
      <div class="btn">
        <span>Imagem</span>
        <input type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>

      <input type="password" placeholder="Senha" v-model="password">
      <input type="password" placeholder="Confime sua Senha" v-model="password_confirmation">

      <button class="btn blue" v-on:click="perfil()">Atualizar</button>
    </span>

  </SiteTemplate>
</template>

<script>
import SiteTemplate from "../../templates/SiteTemplate.vue";
import axios from "axios";

export default {
  name: "Perfil",
  components: {
    SiteTemplate,
  },
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      errors: '',
      usuario: '',
      usuarioToken: ''
    }
  },created() {
    let usuarioAux = sessionStorage.getItem('user');
    if (usuarioAux) {
      this.usuario = JSON.parse(usuarioAux);
      this.name = this.usuario.name;
      this.email = this.usuario.email;
      this.usuarioToken = sessionStorage.getItem('token');
    }
    console.log(this.usuarioToken)
    console.log(usuarioAux)
  },
  methods:{
    perfil() {
      const headers = {
        'Authorization': 'Bearer '+JSON.parse(this.usuarioToken),
      };
      console.log(headers);
      axios.put('http://localhost/api/perfil', {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation
      }, {headers})
        .then(response => {
          console.log(response.data)
          // if (response.data.token) {
          //   console.log(response.data)
          //
          //   // console.log('Cadastro Realizado com SUCESSO!!')
          //   this.errors = ``;
          //
          //   // sessionStorage.setItem('user', JSON.stringify(response.data.user));
          //
          //   // this.$router.push('/');
          //   // return {success: true, token: response.data.token}
          // }
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
