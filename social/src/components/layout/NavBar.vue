<template>
  <nav :class=" cor || 'blue'">
    <div class="nav-wrapper container">
      <router-link class="brand-logo" :to="url || '/'">{{ logo || 'Site Logo'}}</router-link>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <slot />
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'NavBar',
  props: ['cor', 'url', 'logo'],

  data() {
    return {
    }
  }
}
</script>
<style scoped>

</style>
