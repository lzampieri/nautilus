<script setup>
import 'leaflet/dist/leaflet.css'
import { LMap, LTileLayer } from '@maxel01/vue-leaflet'
import { ref } from 'vue'
import Catalogues from './Catalogues.vue';
import AddPlace from './AddPlace.vue';

const zoom = ref(2)
</script>

<template>
  <div class="h-screen w-screen absolute top-0 right-0 -z-10">
    <LMap v-model:zoom="zoom" :center="[47.41322, -1.219482]">
      <LTileLayer
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        layer-type="base"
        name="OpenStreetMap"
      />
    </LMap>
  </div>
  <Catalogues />
  <AddPlace />
</template>