<template>
    <div class="mb-3">
<BreadCumb page="Nouveau dépot" hote="Profile" />
    </div>

    <form class="max-w-sm mx-auto mb-5" enctype="">
        <div>
        <p class="text-center text-sm font-normal text-gray-500 lg:text-lg dark:text-gray-400">Faire un nouveau dépot !</p><p class="text-center mb-3 text-sm font-normal text-gray-500 lg:text-lg dark:text-gray-400">Veillez enrégistrer votre bordereau ici pour confirmation du dépot</p>
    </div>
        <div class="mb-5">
            <label for="ref" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">N° Réf.</label>
            <input type="text" id="ref" v-model="depot.ref"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Numéro de réference du bordereau" required />
        </div>
        <div class="mb-5">
            <label for="montant" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Montant (FC)</label>
            <input type="text" id="montant"  v-model="depot.montant"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Montant deposé" required />
        </div>
        <div class="mb-5">
            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date du
                dépot</label>
            <input type="date" id="date"  v-model="depot.date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
        <div class="mb-5">
            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo du
                bordereau</label>
            <input type="file" id="photo"  v-on="depot.photo" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
        <button type="submit"
            class="text-gray-900 bg-yellow-500 hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>
    </form>
</template>

<script setup>
import BreadCumb from '@/components/BreadCumb.vue';
import {ref} from 'vue'
const depot = ref({
    ref:"jfjf",
    montant:"500",
    date:null,
    photo:null
    })
</script>