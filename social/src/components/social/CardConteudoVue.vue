<template>
  <div class="row">
    <div class="card ">
      <div class="card-content">
        <div class="row valign-wrapper">
          <GridVue tamanho="1">
            <img :src="perfil" :alt="nome" class="circle responsive-img">
          </GridVue>
          <GridVue tamanho="11">
            <span class="black-text">
              <strong>{{ nome }}</strong> - <small>{{ data }}</small>
            </span>
          </GridVue>
        </div>

        <slot/>
      </div>
      <div class="card-action">
        <i class="material-icons">favorite_border</i>
        <i class="material-icons">insert_comment</i>
      </div>
    </div>
  </div>
</template>

<script>
import GridVue from "@/components/layout/GridVue.vue";

export default {
  name: 'CardConteudoVue',
  props: ['perfil', 'nome', 'data'],
  components: {
    GridVue
  },
  data() {
    return {}
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
