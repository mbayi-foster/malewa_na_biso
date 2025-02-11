<script setup>
import { RouterLink, RouterView } from 'vue-router'
import NavBar from './components/NavBar.vue'
import BreadCumb from './components/BreadCumb.vue';
</script>
<template>
  <NavBar />
 
  <div class="md:mx-7 mt-4 mx-1">
    <RouterView />
  </div>
</template>
