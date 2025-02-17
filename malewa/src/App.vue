<script setup>
import { RouterView } from 'vue-router'
import '@fortawesome/fontawesome-free/css/all.css'
import NavBar from './components/NavBar.vue'
import { useUserStore } from './stores/store'
import { computed, onMounted, ref } from 'vue'

const userStore = useUserStore()
const user = ref()
const isConnected = ref()
const calcule = () => {
  userStore.loadUser()
  user.value = userStore.user
  isConnected.value = userStore.isAuthenticated
}
onMounted(calcule)
computed(calcule)
</script>
<template>
  <NavBar v-if="isConnected" :user="user" />
  <div class="md:mx-7 mt-4 mx-1">
    <router-view></router-view>
  </div>
</template>
