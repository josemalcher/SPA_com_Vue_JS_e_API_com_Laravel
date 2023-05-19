<template>
  <span>
    <PublicarConteudoVue/>

    <CardConteudoVue
      perfil="https://materializecss.com/images/yuna.jpg"
      nome="Maria"
      data="23/01/2023 15:50"
    >
      <CardDetalheVue
        img="https://materializecss.com/images/sample-1.jpg"
        titulo="Titulo da imagem"
        txt="I am a very simple card. I am good at containing small bits of information."
      />
    </CardConteudoVue>
  </span>
</template>

<script>
import CardConteudoVue from '@/components/social/CardConteudoVue.vue';
import CardDetalheVue from '@/components/social/CardDetalheVue.vue';
import PublicarConteudoVue from "@/components/social/PublicarConteudoVue.vue";

export default {
  name: "Home",
  components: {
    CardConteudoVue,
    CardDetalheVue,
    PublicarConteudoVue
  }
}
</script>

<style scoped>

</style>
