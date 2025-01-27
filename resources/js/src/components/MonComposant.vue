<template>
    <div class="mon-composant">
      <h2>{{ titre }}</h2>
      <p>{{ description }}</p>
    </div>
  </template>
  
  <script>
  export default {
    name: 'MonComposant',
    props: {
      titre: {
        type: String,
        required: true
      },
      description: {
        type: String,
        default: 'Ceci est une description par défaut.'
      }
    }
  }
  </script>
  
  <style scoped>
  .mon-composant {
    border: 1px solid #ccc;
    padding: 16px;
    margin: 16px 0;
  }
  </style>