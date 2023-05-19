<template>
  <span>
    <div class="card-image">
      <img :src="img">
      <span class="card-title ">{{ titulo || ''}}</span>
    </div>

    <div class="card-content">
      <p>{{ txt }}</p>
    </div>
  </span>
</template>

<script>
export default {
  name: 'CardDetalheVue',
  props: ['img', 'titulo', 'txt'],

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
