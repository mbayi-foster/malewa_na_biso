<script setup>
import { RouterLink, RouterView } from 'vue-router'
import NavBar from './components/NavBar.vue'
</script>
<template>
  <NavBar />
  <div class="md:mx-7 mt-4">
    <RouterView />
  </div>
</template>
