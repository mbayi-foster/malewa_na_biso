<script>
import { ref } from 'vue'
export default {
  setup() {
    const user = ref({
      email: "",
      password: ""
    })
    const data = ref("");

    const handleSubmit = () => {
      const email = user.value.email
      const password = user.value.password

      data.value = `${email} et ${password}`
    };

    return {
      handleSubmit,
      user,
      data,
      user
    }
  }
}
</script>
<template>
  {{ data }}
  <form @submit.prevent="handleSubmit"
    class="mx-auto w-full md:w-96 flex flex-col items-center justify-center align-middle h-screen">
    <div>
      <h1
        class="text-center mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        Bienvenue</h1>
      <p class="text-center mb-6 text-sm font-normal text-gray-500 lg:text-lg dark:text-gray-400">Veillez entrer
        vos données pour se connecter</p>
    </div>
    <div class="mb-5 w-full">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
      <input type="email" id="email" v-model="user.email"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="name@flowbite.com" required />
    </div>
    <div class="mb-5 w-full">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
      <input type="password" id="password" v-model="user.password"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required />
    </div>
    <div class=" w-full flex items-start mb-5">
      <div class="flex items-center h-5">
        <input id="remember" type="checkbox" value=""
          class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
          required />
      </div>
      <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
    </div>
    <button type="submit"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 m-0">Se
      connecter</button>
  </form>
</template>