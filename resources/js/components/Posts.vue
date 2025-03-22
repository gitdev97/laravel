<template>
    <div>
        <h1>This is Screen 1</h1>
        <input v-model="searchKeyword" v-on:keyup="filterRecords"/>
        <!-- Table to display records -->
        <table v-if="records.length > 0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Notes</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="record in records" :key="record.id">
                <td>{{ record.id }}</td>
                <td>{{ record.title }}</td>
                <td>{{ record.status }}</td>
                <td>{{ record.notes }}</td>
            </tr>
            </tbody>
        </table>

        <!-- Show a message if no records are available -->
        <p v-else>No records available.</p>

        <!-- Pagination Controls -->
        <div class="pagination" v-if="totalPages > 0">
            <button @click="changePage(currentPage - 1)" :disabled="currentPage <= 1">&#8672; Previous</button>
            <span>Page {{ currentPage }} of {{ totalPages }}</span>
            <button @click="changePage(currentPage + 1)" :disabled="currentPage >= totalPages">Next &#8674;</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Posts',
    data() {
        return {
            records: [], // Store records from the API
            searchKeyword: '',
            currentPage: 1, // Current page for pagination
            totalPages: 1, // Total number of pages
            totalRecords: 0, // Total records after filtering
        };
    },
    mounted() {
        this.fetchRecords(); // Fetch records when the component is mounted
    },
    methods: {
        async fetchRecords() {
            // If a previous request is still in progress, cancel it
            if (this.cancelTokenSource) {
                this.cancelTokenSource.cancel('Request cancelled due to new one.');
            }

            // Create a new cancel token source
            this.cancelTokenSource = axios.CancelToken.source();

            try {
                // Set a timeout to simulate a delay of 300ms

                const response = await axios.post('/api/records',
                    {
                        keyword: this.searchKeyword,
                        page: this.currentPage
                    },
                {
                        cancelToken: this.cancelTokenSource.token,
                    }
                );

                // If the request is not aborted, store the data in records
                this.records = response.data.data;
                this.totalRecords = response.data.total;
                this.totalPages = Math.ceil(this.totalRecords / response.data.per_page);

            } catch (error) {
                if (axios.isCancel(error)) {
                    console.log('Request cancelled:', error.message);
                } else {
                    console.error('Error fetching records:', error);
                }
            }
        },

        changePage(page) {
            if (page >= 1 && page <= this.totalPages) {
                this.currentPage = page;
                this.fetchRecords(); // Fetch records for the new page
            }
        },

        async filterRecords() {
            setTimeout(async () => {
                this.fetchRecords();
            }, 300); // Delay for 300ms
        }
    },
};
</script>

<style scoped>
/* Basic styling for the table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;

    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
}

input {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

.pagination {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    margin: 20px auto;

    button {
        cursor: pointer;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 6px 12px;
        transition: .3s;

        &:hover {
            background: #ccc;
        }
    }
}
</style>
