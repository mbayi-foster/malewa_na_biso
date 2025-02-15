<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="pb-4 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    v-model="searchQuery" placeholder="Rechercher...">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th v-for="column in columns" :key="column.key" scope="col" class="px-6 py-3">
                        {{ column.label }}
                        <!--     <input type="text" id="table-search" v-model="filters[column.key]" placeholder="Filtre"
                            v-if="column.filter"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                           <input v-model="filters[column.key]" placeholder="Filtre" v-if="column.filter"
                          class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                  -->
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in paginatedData" :key="item.id" scope="row" class="px-6 py-4 ">
                    <td v-for="column in columns" :key="column.key">
                        <div v-if="column.key != 'email' && column.key != 'nom'">
                            {{ item[column.key] }}
                        </div>
                        <div v-if="column.key == 'email'">
                            <p> {{ item[column.key] }}</p>
                            <p>
                                {{ item['phone'] }}
                            </p>
                        </div>
                        <div v-if="column.key == 'nom'">
                            {{ item['prenom'] }} {{ item[column.key] }}
                        </div>
                        <!-- <div v-if="column.key=='prenom'">
                            <p>
                                {{ item['prenom'] }}
                            </p>
                        </div> -->
                    </td>
                    <td>edit</td>

                </tr>
            </tbody>
        </table>
        <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
            aria-label="Table navigation">
            <span
                class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                Showing <span class="font-semibold text-gray-900 dark:text-white">{{ startIndex }}-{{ endIndex }} of
                    <span class="font-semibold text-gray-900 dark:text-white">{{ totalItems }}</span></span>
            </span>
            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                <li>
                    <a @click.prevent="prevPage"
                        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                </li>
                <li v-for="page in totalPagesArray" :key="page">
                    <a @click.prevent="goToPage(page)"
                        :class="['flex items-center justify-center px-3 h-8 leading-tight', { 'text-blue-600 border border-gray-300 bg-blue-50': page === currentPage.value, 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white': page !== currentPage.value }]">
                        {{ page }}
                    </a>
                </li>
                <li>
                    <a @click.prevent="nextPage"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                </li>
            </ul>
        </nav>
    </div>

</template>

<script setup>
import { ref, computed } from 'vue';

const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
    columns: {
        type: Array,
        required: true,
    },
    itemsPerPage: {
        type: Number,
        default: 10,
    },
});

const currentPage = ref(1);
const filters = ref({});
const searchQuery = ref('');

const filteredData = computed(() => {
    return props.data.filter(item => {
        const filteredBySearch = Object.values(item).some(value => {
            return value !== null && value.toString().toLowerCase().includes(searchQuery.value.toLowerCase())
        }
        );
        const filteredByFilters = Object.keys(filters.value).every(key => {
            return !filters.value[key] || item[key].toString().toLowerCase().includes(filters.value[key].toLowerCase());
        });

        return filteredBySearch && filteredByFilters;
        //  return item
    });
});

const totalItems = computed(() => filteredData.value.length);
const totalPages = computed(() => Math.ceil(totalItems.value / props.itemsPerPage));

const startIndex = computed(() => (currentPage.value - 1) * props.itemsPerPage + 1);
const endIndex = computed(() => Math.min(currentPage.value * props.itemsPerPage, totalItems.value));

const paginatedData = computed(() => {
    const start = (currentPage.value - 1) * props.itemsPerPage;
    return filteredData.value.slice(start, start + props.itemsPerPage);
});

const totalPagesArray = computed(() => Array.from({ length: totalPages.value }, (_, i) => i + 1));

const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
    }
};

const prevPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
};

const goToPage = (page) => {
    currentPage.value = page;
};
</script>

<style scoped>
table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    border: 1px solid #ddd;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}
</style>