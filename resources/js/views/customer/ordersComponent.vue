<template>
    <div class="orders-container">
        <h1>Order Management</h1>
        <div class="orders-list">
            <div class="order-card" v-for="order in orders" :key="order.id">
                <h2>Order #{{ order.id }}</h2>
                <p><strong>Customer:</strong> {{ order.customerName }}</p>
                <p><strong>Total:</strong> ${{ order.total.toFixed(2) }}</p>
                <p><strong>Status:</strong> <span :class="statusClass(order.status)">{{ order.status }}</span></p>
                <div class="actions">
                    <button @click="viewOrder(order.id)">View Details</button>
                    <button @click="editOrder(order.id)">Edit Order</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ordersComponent",
        data() {
            return {
                orders: [
                    { id: 101, customerName: "John Doe", total: 250.75, status: "Shipped" },
                    { id: 102, customerName: "Jane Smith", total: 150.5, status: "Pending" },
                    { id: 103, customerName: "Emily Davis", total: 320.0, status: "Delivered" },
                    { id: 104, customerName: "David Brown", total: 120.3, status: "Canceled" },
                ],
            };
        },
        methods: {
            viewOrder(id) {
                this.$router.push(`/orders/${id}`);
            },
            editOrder(id) {
                this.$router.push(`/orders/${id}/edit`);
            },
            statusClass(status) {
                return {
                    Shipped: "status-shipped",
                    Pending: "status-pending",
                    Delivered: "status-delivered",
                    Canceled: "status-canceled",
                }[status] || "status-default";
            },
        },
    };
</script>

<style scoped>
    .orders-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 2rem;
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .orders-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .order-card {
        padding: 15px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }

    .order-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .order-card h2 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 10px;
    }

    .order-card p {
        margin: 5px 0;
        font-size: 1rem;
    }

    .actions {
        margin-top: 15px;
    }

    button {
        padding: 8px 12px;
        margin-right: 10px;
        font-size: 0.9rem;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: opacity 0.3s ease;
    }

    button:hover {
        opacity: 0.9;
    }

    button:first-of-type {
        background-color: #3498db; /* Blue for "View Details" */
    }

    button:last-of-type {
        background-color: #e67e22; /* Orange for "Edit Order" */
    }

    .status-shipped {
        color: #2ecc71;
    }

    .status-pending {
        color: #f1c40f;
    }

    .status-delivered {
        color: #3498db;
    }

    .status-canceled {
        color: #e74c3c;
    }
</style>
