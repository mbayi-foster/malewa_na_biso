<template>
    <div id="app">
      <h1>Bienvenue dans mon application Vue.js</h1>
      <MonComposant titre="Titre du Composant" description="Ceci est une description personnalisée." />
      <MonComposant titre="Un autre Titre" />
    </div>
  </template>
  
  <script>
  import MonComposant from './src/components/MonComposant.vue';
  
  export default {
    name: 'App',
    components: {
      MonComposant
    }
  }
  </script>
  
  <style>
  /* Styles globaux ici */
  </style>