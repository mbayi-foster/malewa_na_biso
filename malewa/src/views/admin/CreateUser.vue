<template>
     <div class="mb-3">
        <BreadCumb lien="/users/" page="Nouvel utilisateur" hote="Adminstration" />
    </div>

<form class="max-w-sm mx-auto mb-5" @submit.prevent="handleSubmit">
    {{data}}
    <div>
        <p class="text-center text-sm font-normal text-gray-500 lg:text-lg dark:text-gray-400">Enregistrement d'un nouvel utilisateur !</p><p class="text-center mb-3 text-sm font-normal text-gray-500 lg:text-lg dark:text-gray-400">Veillez entrer les informations du nouvelle utilisateur</p>
    </div>
    <div class="mb-5">
    <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
    <input v-model="user.prenom" type="text" id="prenom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
  </div>
  <div class="mb-5">
    <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
    <input v-model="user.nom" type="text" id="nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
  </div>
  <div class="mb-5">
    <label for="capitale" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capitale</label>
    <input v-model="user.toPaye" type="number" id="capitale" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Montant total à payer" required />
  </div>
  
  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
    <input v-model="user.email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com"  required />
  </div>
  <button type="submit" class="text-gray-900 bg-yellow-500 hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>
</form>

</template>

<script setup>
import BreadCumb from '@/components/BreadCumb.vue';
import {ref} from 'vue'
import Users from '@/api/users'

const user = ref({
    nom:"",
    prenom:"",
    email:"",
    toPaye:""
    })
    const data = ref("");

    const handleSubmit = async () => {
    const  newUser = {
        nom:user.value.nom,
    prenom:user.value.prenom,
    email:user.value.email,
    to_paye:user.value.toPaye
      }

      try {
        data.value = await Users.store('/users', newUser);
        console.log(data.value) // Remplacez par votre ressource
    } catch (error) {
        console.error('Erreur lors du chargement des éléments:', error);
    }

     
    };
</script>