<template>
    <div class="container mt-4">
        <h2>Manage Leave</h2>

        <div class="">
            <div class="card flex-fill me-2">
                <div class="card-header">
                    <h5 class="card-title">Manage Leave Requests</h5>
                </div>
                <div class="card-body">
                    <!-- Filter Form -->
                    <div class="d-flex mb-4 gap-2 align-items-end">
                        <div class="form-group">
                            <label for="studentId">Student ID</label>
                            <input type="text" id="studentId" class="form-control" placeholder="Student ID" />
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" class="form-control">
                                <option value="all">All</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fromDate">From Date</label>
                            <input type="date" id="fromDate" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="toDate">To Date</label>
                            <input type="date" id="toDate" class="form-control" />
                        </div>
                        <button class="btn btn-primary">Filter</button>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
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
                            <tr v-for="(leave, index) in leaves" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ leave.studentId }}</td>
                                <td>{{ leave.name }}</td>
                                <td>{{ leave.leaveDates }}</td>
                                <td>{{ leave.days }}</td>
                                <td>{{ leave.applyDate }}</td>
                                <td>
                    <span :class="['badge', leave.status === 'Approved' ? 'bg-success' : 'bg-danger']">
                      {{ leave.status }}
                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-info btn-sm me-1"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-primary btn-sm me-1"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-warning btn-sm me-1"><i class="fas fa-download"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ManageLeaveComponent",
        data() {
            return {
                leaves: [
                    { studentId: "#R2023536", name: "Priviledge Mhlanga", leaveDates: "31-10-2024 - 04-11-2024", days: 5, applyDate: "31-10-2024", status: "Approved" },
                    { studentId: "#1014", name: "Rylee Pratt", leaveDates: "30-10-2024 - 30-10-2025", days: 366, applyDate: "30-10-2024", status: "Rejected" },
                    { studentId: "#1014", name: "Rylee Pratt", leaveDates: "12-10-2024 - 13-10-2024", days: 2, applyDate: "12-10-2024", status: "Approved" },
                    { studentId: "#1014", name: "Rylee Pratt", leaveDates: "31-10-2023 - 24-04-2025", days: 542, applyDate: "04-10-2024", status: "Approved" }
                ]
            };
        }
    };
</script>

<style scoped>
    .container {
        max-width: 1000px;
        background-color: #f5f9fc;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
    }

    .card {
        border: 1px solid #dee2e6;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .badge {
        padding: 5px 10px;
        font-size: 0.9rem;
    }

    .btn i {
        margin-right: 0;
    }
</style>
