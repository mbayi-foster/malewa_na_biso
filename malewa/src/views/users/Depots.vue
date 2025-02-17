<template>
  <div class="mb-3">
    <BreadCumb page="Enregistrements" hote="Profile" />
  </div>
  <TableDepots
    :data="data"
    :columns="tableColumns"
    :has-data="hasData"
    :load="load"
    :refresh="fetchItems"
  />
</template>

<script setup>
import api from '@/api/api'
import BreadCumb from '@/components/BreadCumb.vue'
import TableDepots from '@/components/tables/TableDepots.vue'
import { useUserStore } from '@/stores/store'
import { onMounted, ref } from 'vue'

const userStore = useUserStore()
const data = ref([])
const hasData = ref(false)
const load = ref(true)
const tableColumns = [
  { key: 'ref', label: 'Réference' },
  { key: 'montant', label: 'Montant' },
  { key: 'photo', label: 'Photo' },
  { key: 'date_depot', label: 'Date du dépot' },
  { key: 'comptable', label: 'Comptable' },
  { key: 'pdg', label: 'PDG' },
  // Ajoutez d'autres colonnes ici
]

const fetchItems = async () => {
  userStore.loadUser()
  const userId = userStore.user.id
  load.value = true
  hasData.value = false
  try {
    const datas = await api.get(`enregistrements/${userId}`)
    console.log(datas)
    if (Array.isArray(datas) && datas.length >= 1) {
      data.value = datas
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
