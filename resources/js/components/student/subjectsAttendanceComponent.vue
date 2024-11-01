<template>
    <div class="container mt-4 p-4 border rounded shadow-sm" style="background-color: #f8f9fa;">
        <div class="d-flex align-items-center mb-3">
            <h4 class="mb-0">Attendance Report</h4>
        </div>

        <!-- First line: Faculty, Program, Session, Semester -->
        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <label for="faculty" class="form-label">Faculty <span class="text-primary">*</span></label>
                <select id="faculty" v-model="selectedFaculty" class="form-select">
                    <option disabled value="">Select</option>
                    <option>Science</option>
                    <option>Arts</option>
                    <option>Commerce</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="program" class="form-label">Program <span class="text-primary">*</span></label>
                <select id="program" v-model="selectedProgram" class="form-select">
                    <option disabled value="">Select</option>
                    <option>Program A</option>
                    <option>Program B</option>
                    <option>Program C</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="session" class="form-label">Session <span class="text-primary">*</span></label>
                <select id="session" v-model="selectedSession" class="form-select">
                    <option disabled value="">Select</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="semester" class="form-label">Semester <span class="text-primary">*</span></label>
                <select id="semester" v-model="selectedSemester" class="form-select">
                    <option disabled value="">All</option>
                    <option>1st Semester</option>
                    <option>2nd Semester</option>
                    <option>3rd Semester</option>
                </select>
            </div>
        </div>

        <!-- Second line: Section, Course, Month, Year and Search Button -->
        <div class="row g-3">
            <div class="col-md-3">
                <label for="section" class="form-label">Section <span class="text-primary">*</span></label>
                <select id="section" v-model="selectedSection" class="form-select">
                    <option disabled value="">All</option>
                    <option>Section A</option>
                    <option>Section B</option>
                    <option>Section C</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="course" class="form-label">Course <span class="text-primary">*</span></label>
                <select id="course" v-model="selectedCourse" class="form-select">
                    <option disabled value="">Select</option>
                    <option>Course 1</option>
                    <option>Course 2</option>
                    <option>Course 3</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="date" class="form-label">Date <span class="text-primary">*</span></label>
                <input type="date" id="date" v-model="selectedDate" class="form-control" required>
            </div>

            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-info w-100">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AttendanceReportComponent",
        data() {
            return {
                selectedFaculty: '',
                selectedProgram: '',
                selectedSession: '',
                selectedSemester: '',
                selectedSection: '',
                selectedCourse: '',
                selectedDate: '',
            };
        }
    }
</script>

<style scoped>
    h4 {
        font-weight: bold;
        color: #333;
        border-left: 4px solid #0d6efd;
        padding-left: 8px;
    }
    .form-label {
        font-weight: 600;
    }
    .form-select, .form-control {
        background-color: #f0f2f5;
    }
    .btn-info {
        font-size: 16px;
        padding: 8px;
    }
</style>
