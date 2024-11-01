<template>
    <div class="">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Manage Leave Requests</h5>
            </div>
            <div class="card-body">
                <!-- Filter Form -->
                <div class="filter-form d-flex mb-4 gap-3 align-items-end">
                    <div class="form-group">
                        <label for="studentId">Student ID</label>
                        <input v-model="filters.studentId" type="text" id="studentId" class="form-control" placeholder="Enter Student ID" />
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select v-model="filters.status" id="status" class="form-select">
                            <option value="all">All</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fromDate">From Date</label>
                        <input v-model="filters.fromDate" type="date" id="fromDate" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="toDate">To Date</label>
                        <input v-model="filters.toDate" type="date" id="toDate" class="form-control" />
                    </div>
                    <button class="btn btn-primary filter-button" @click="fetchLeaves">Filter</button>
                </div>

                <!-- Leave Requests Table -->
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Leave Dates</th>
                            <th>Days</th>
                            <th>Apply Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(leave, index) in leaves" :key="leave.id">
                            <td>{{ index + 1 }}</td>
                            <td>{{ leave.student_id }}</td>
                            <td>{{ leave.name }}</td>
                            <td>{{ leave.leave_start_date }} - {{ leave.leave_end_date }}</td>
                            <td>{{ leave.days }}</td>
                            <td>{{ leave.apply_date }}</td>
                            <td>
                                <span :class="['badge', leave.status === 'approved' ? 'bg-success' : leave.status === 'rejected' ? 'bg-danger' : 'bg-secondary']">
                                    {{ leave.status }}
                                </span>
                            </td>
                            <td>
                                <!-- Dropdown Action Button -->
                                <div class="dropdown action-dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-question"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" @click.prevent="approveLeave(leave)">Approve</a></li>
                                        <li><a class="dropdown-item" href="#" @click.prevent="rejectLeave(leave)">Reject</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-primary btn-sm me-1">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "ManageLeaveComponent",
        data() {
            return {
                leaves: [],
                filters: {
                    studentId: '',
                    status: 'all',
                    fromDate: '',
                    toDate: ''
                }
            };
        },
        methods: {
            async fetchLeaves() {
                try {
                    const response = await axios.get("/api/leaves", { params: this.filters });
                    this.leaves = response.data;
                } catch (error) {
                    console.error('Error fetching leave data:', error);
                }
            },
            async approveLeave(leave) {
                if (!leave.id) {
                    console.error("Leave ID is missing:", leave);
                    return;
                }
                try {
                    const response = await axios.put(`/api/leaves/${leave.id}`, { status: 'approved' });
                    leave.status = response.data.status; // Update the leave status based on the response
                } catch (error) {
                    console.error("Error approving leave:", error.response ? error.response.data : error.message);
                }
            },

            async rejectLeave(leave) {
                if (!leave.id) {
                    console.error("Leave ID is missing:", leave);
                    return;
                }
                try {
                    const response = await axios.put(`/api/leaves/${leave.id}`, { status: 'rejected' });
                    leave.status = response.data.status; // Update the leave status based on the response
                } catch (error) {
                    console.error('Error rejecting leave:', error.response ? error.response.data : error.message);
                }
            }

        },
        created() {
            this.fetchLeaves();
        }
    };
</script>

<style scoped>
    .manage-leave-container {
        max-width: 1000px;
        margin: 0 auto;
        background-color: #f5f9fc;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }


    .card {
        border: 1px solid #dee2e6;
    }

    .card-title {
        font-weight: 600;
        color: #007bff;
    }

    .table th,
    .table td {
        vertical-align: middle;
        text-align: center;
    }

    .filter-form .form-group label {
        font-weight: 500;
        color: #555;
    }

    .filter-form .filter-button {
        align-self: flex-end;
    }

    .badge {
        padding: 5px 10px;
        font-size: 0.85rem;
        border-radius: 12px;
    }

    .action-dropdown {
        display: inline-block;
    }

    .btn i {
        margin-right: 0;
    }

    .table-primary {
        background-color: #e3f2fd;
    }

    .btn-primary, .btn-danger {
        color: #fff;
    }

    .btn-primary i,
    .btn-danger i {
        color: #fff;
    }
</style>
