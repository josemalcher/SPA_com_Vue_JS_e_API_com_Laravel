<template>
  <SiteTemplate>

    <span slot="menuesquerdo">
      <div class="row valign-wrapper">
        <GridVue tamanho="4">
          <img src="https://materializecss.com/images/yuna.jpg" alt="" class="circle responsive-img">
          <!-- notice the "circle" class -->
        </GridVue>
        <GridVue tamanho="8">
          <span class="black-text"><h5>Maria Jozefina</h5>This is a square image</span>
        </GridVue>
      </div>
    </span>

    <span slot="principal">
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



  </SiteTemplate>
</template>

<script>
import SiteTemplate from "../../templates/SiteTemplate.vue";
import CardConteudoVue from '@/components/social/CardConteudoVue.vue';
import CardDetalheVue from '@/components/social/CardDetalheVue.vue';
import PublicarConteudoVue from "@/components/social/PublicarConteudoVue.vue";
import GridVue from "../../components/layout/GridVue.vue";

export default {
  name: "Home",
  components: {
    SiteTemplate,
    CardConteudoVue,
    CardDetalheVue,
    PublicarConteudoVue,
    GridVue
  }
}
</script>

<style scoped>

</style>
