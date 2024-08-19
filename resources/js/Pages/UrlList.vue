<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed, onMounted } from 'vue';

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});


const urls = ref([]);
const currentPage = ref(1);
const itemsPerPage = ref(10);


const paginatedUrls = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage.value;
    return urls.value.slice(start, start + itemsPerPage.value);
});


async function fetchUrls() {
    try {
        const response = await fetch('/api/urls');
        const data = await response.json();
        urls.value = data; 
    } catch (error) {
        console.error('Error getting URLs:', error);
    }
}


function nextPage() {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
    }
}


function previousPage() {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
}


const totalPages = computed(() => {
    return Math.ceil(urls.value.length / itemsPerPage.value);
});


onMounted(() => {
    fetchUrls();
});
</script>

<template>
    <Head title="UrlList" />
    <div class="url-list">
        <table v-if="paginatedUrls.length" class="styled-table">
            <thead>
                <tr>
                    <th>Original URL</th>
                    <th>Shortened URL</th>
                    <th>Clicks</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="url in paginatedUrls" :key="url.id">
                    <td>{{ url.original_url }}</td>
                    <td>
                        <a 
                            :href="url.shortened_url" 
                            target="_blank" 
                            class="url-link" 
                        >
                            {{ url.shortened_url }}
                        </a>
                    </td>
                    <td>{{ url.clicks }}</td>
                </tr>
            </tbody>
        </table>
        <p v-else>There are no shortened URLs.</p>

        <div class="pagination">
            <button @click="previousPage" :disabled="currentPage === 1" class="button-pag font-pag">Previous</button>
            <span class="font-pag">Page {{ currentPage }} of {{ totalPages }}</span>
            <button @click="nextPage" :disabled="currentPage === totalPages" class="button-pag font-pag">Next</button>
        </div>
    </div>
</template>

<style scoped>
.url-list {
    margin: 20px;
    /* background: #f9f9f9; */
    border-radius: 10px; 
    /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  */
    padding: 20px; 
}

.table-title {
    color: #444444;
    font-size: 24px;
    font-weight: bold; 
    margin-bottom: 20px; 
}

.styled-table {
    border-collapse: collapse;
    width: 100%;
    margin: 20px 0;
    font-size: 14px;
    text-align: left;
    border-radius: 10px;
    overflow: hidden; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.styled-table thead {
    background-color: #6875f5; 
    color: white; 
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
    border: none; 
}

.styled-table tbody tr {
    border-bottom: 1px solid #eaeaea; 
    transition: background-color 0.3s; 
}

.styled-table tbody tr:hover {
    background-color: #f1f1f1; 
    /* cursor: pointer; */
}

.url-link {
    font-weight: normal; 
    color: #6875f5; 
    text-decoration: none; 
}

.url-link:hover {
    text-decoration: underline; 
    color: darkblue;
}

.pagination {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.pagination button {
    padding: 10px 15px;
    border: none; 
    border-radius: 5px; 
    background-color: #6875f5; 
    color: white; 
    margin: 0 5px;
    cursor: pointer;
    transition: background-color 0.3s; 
}

.pagination button:hover {
    background-color: #5a6cb5; 
}

.pagination span {
    margin: 0 10px;
    font-size: 14px;
    font-weight: 600;
    color: #444; 
}

.font-pag {
    font-size: 13px;
    font-weight: 600;
}
</style>