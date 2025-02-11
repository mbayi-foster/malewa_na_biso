<script setup>
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';

DataTable.use(DataTablesCore);

const data = [
    [1, 2],
    [3, 4],
    [3, 4],
    [3, 4],
    [3, 4],
    [3, 4],
    [3, 4],
    [3, 4],
    [3, 4],
    [3, 4],
    [3, 4],
    [3, 4],
    [3, 4],
    [3, 4],
    [3, 4],
    [3, 4],
    [3, 4],
];
const tableOptions = {
    paging: true,
    searching: true,
    ordering: true,
    pageLength: 10,
}
</script>

<template>
    <div class="mx-5">
        <DataTable :data="data" :options="tableOptions"
            class="display w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <!--  <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th> -->
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
        </DataTable>
    </div>
</template>
<style>
@import 'datatables.net-dt';

/* Styles pour le tableau */
.dataTable {
    border-collapse: collapse;
    width: 100%;
}

.dataTable th,
.dataTable td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #e2e8f0;
    /* Couleur des bordures */
}

.dataTable th {
    background-color: #f7fafc;
    /* Couleur d'arrière-plan des en-têtes */
    font-weight: 600;
    /* Gras */
    color: #2d3748;
    /* Couleur du texte */
}

.dataTable tr:hover {
    background-color: #edf2f7;
    /* Couleur de survol des lignes */
}

.dataTable .dataTables_wrapper {
    padding: 20px;
    /* Espace autour du tableau */
}
</style>