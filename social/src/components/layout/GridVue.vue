<template>
  <div :class="'col s'+ tamanho">
    <slot></slot>
  </div>
</template>

<style scoped>

</style>
<script>
export default ({
  name: "GridVue",
  props: ['tamanho'],
  data(){

  }
})
</script>
