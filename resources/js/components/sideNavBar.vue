
<template>
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <router-link class="nav-link" to="/admin/dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </router-link>
                    <div class="sb-sidenav-menu-heading">Ecommerce</div>

                    <!-- Sidebar - Product Dropdown -->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        <span>Product</span>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link class="nav-link" to="/admin/product/category">Category</router-link>
                            <router-link class="nav-link" to="/admin/product/sub_category">SubCategory</router-link>
                            <router-link class="nav-link" to="/admin/product/product">Product</router-link>
                        </nav>
                    </div>

                    <!-- Sidebar - Customer Dropdown -->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        <span>Customer</span>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link to="/admin/customer/customers" class="nav-link" >Customers</router-link>
                            <router-link to="/admin/customer/orders" class="nav-link" >Orders</router-link>
                        </nav>
                    </div>



                    <!-- Sidebar - Students Dropdown -->
                    <a class="nav-link collapsed" href="#"
                       data-bs-toggle="collapse"
                       data-bs-target="#collapseLayouts3"
                       aria-expanded="false"
                       aria-controls="collapseLayouts3">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        <span>Students</span>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <!-- Attendance Dropdown under Students -->
                            <a class="nav-link collapsed" href="#"
                               data-bs-toggle="collapse"
                               data-bs-target="#collapseAttendances"
                               aria-expanded="false"
                               aria-controls="collapseAttendances">
                                <span>Attendances</span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseAttendances" aria-labelledby="headingTwo" data-bs-parent="#collapseLayouts3">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <!-- Nested Links under Attendances -->
                                    <router-link to="/admin/student/attendance/subjects" class="nav-link">Subjects Attendance</router-link>
                                    <router-link to="/admin/student/attendance/reports" class="nav-link">Attendance Reports</router-link>
                                </nav>
                            </div>

                            <router-link to="/admin/student/manage-leave" class="nav-link">Manage Leave</router-link>
                            <router-link to="/admin/student/student-notes" class="nav-link">Student Notes</router-link>

                            <!-- Corrected Enrollments Link -->
                            <a class="nav-link collapsed" href="#"
                               data-bs-toggle="collapse"
                               data-bs-target="#collapseEnrollments"
                               aria-expanded="false"
                               aria-controls="collapseEnrollments">
                                <span>Enrollments</span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseEnrollments" aria-labelledby="headingThree" data-bs-parent="#collapseLayouts3">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <!-- Nested Links under Enrollments (Add your links here) -->
                                    <router-link to="/admin/student/single-enroll" class="nav-link">Single Enroll</router-link>
                                    <router-link to="/admin/student/group-enroll" class="nav-link">Group Enrolls</router-link>
                                    <router-link to="/admin/student/course-Add-drop" class="nav-link">Course Add Drop</router-link>
                                    <router-link to="/admin/student/course-graduation" class="nav-link">Course Graduation</router-link>
                                </nav>
                            </div>
                            <router-link to="/admin/student/alumni-list" class="nav-link">Alumni List</router-link>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
</template>


<script>
    export default {
        name: "sideNavBar"
    }
</script>

<style scoped>

</style>