<template>
    <div class="customer-list">
        <h1>Customer List</h1>
        <div class="search-bar">
            <input type="text" v-model="search" placeholder="Search customers..." />
        </div>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="customer in filteredCustomers" :key="customer.id">
                <td>{{ customer.name }}</td>
                <td>{{ customer.email }}</td>
                <td>
                    <button class="btn view-btn" @click="viewCustomer(customer.id)">View</button>
                    <button class="btn edit-btn" @click="editCustomer(customer.id)">Edit</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                search: '',
                customers: [],
            };
        },
        computed: {
            filteredCustomers() {
                return this.customers.filter(customer =>
                    customer.name.toLowerCase().includes(this.search.toLowerCase())
                );
            },
        },
        methods: {
            viewCustomer(id) {
                this.$router.push(`/customers/${id}`);
            },
            editCustomer(id) {
                this.$router.push(`/customers/${id}/edit`);
            },
        },
        mounted() {
            fetch('/api/customers')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    this.customers = data;
                })
                .catch(error => {
                    console.error('Error fetching customers:', error);
                });
        }
    };
</script>

<style scoped>
    .customer-list {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 1.8rem;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .search-bar {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .search-bar input {
        width: 100%;
        max-width: 500px;
        padding: 8px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:hover {
        background-color: #f1f9ff;
    }

    .btn {
        padding: 6px 12px;
        margin-right: 5px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .view-btn {
        background-color: #3498db;
        color: #fff;
    }

    .edit-btn {
        background-color: #2ecc71;
        color: #fff;
    }

    .btn:hover {
        opacity: 0.85;
    }
</style>
