<template>
  <div class="row">
    <GridVue class="input-field" tamanho="12">
      <textarea v-model="conteudo" class="materialize-textarea"></textarea>
      <label>O que está acontecendo?</label>
    </GridVue>
    <p>
      <GridVue v-if="conteudo" class="btn waves-effect waves-light" tamanho="2 offset-s10">Publicar</GridVue>
    </p>
  </div>
</template>

<script>
import GridVue from "../layout/GridVue.vue";

export default {
  name: 'PublicarConteudoVue',
  components: {GridVue},
  data() {
    return {
      conteudo: '',
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
