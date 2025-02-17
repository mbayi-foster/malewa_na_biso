<script setup>
import { ref, onMounted, computed } from 'vue'
import Users from '@/api/api'
import BreadCumb from '@/components/BreadCumb.vue'
import Table from '@/components/tables/TableUsers.vue'
const users = ref([])
const hasData = ref(false)
const load = ref(true)
const tableColumns = [
  { key: 'nom', label: 'Nom' },
  { key: 'email', label: 'Contact' },
  { key: 'to_paye', label: 'A payer' },
  { key: 'payed', label: 'Déjà payé' },
  // Ajoutez d'autres colonnes ici
]
const fetchItems = async () => {
  load.value = true
  hasData.value = false
  try {
    const data = await Users.get('users')
    if (Array.isArray(data) && data.length >= 1) {
      users.value = data
      hasData.value = true
      load.value = false
    } else {
      load.value = false
      hasData.value = false
    }
  } catch (error) {
    console.error('Erreur lors du chargement des éléments:', error)
  }
}

onMounted(fetchItems)
</script>
<template>
  <div class="mb-3">
    <BreadCumb lien="/" page="Utilisateurs" hote="Adminstration" />
  </div>
  <Table
    :data="users"
    :items-per-page="7"
    :columns="tableColumns"
    :has-data="hasData"
    :load="load"
    :refresh="fetchItems"
  />
</template>
