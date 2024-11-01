
import About from "../views/About.vue";
import dashboardComponent from "../views/dashboardComponent";
import categoryComponent from "../views/product/categoryComponent";
import subCategoryComponent from "../views/product/subCategoryComponent";
import productComponent from "../views/product/productComponent";
import ordersComponent from "../views/customer/ordersComponent";
import customersComponent from "../views/customer/customersComponent";
import subjectsAttendanceComponent from "../components/student/subjectsAttendanceComponent";
import attendanceReportsComponent from "../components/student/attendanceReportsComponent";
import managLeaveComponent from "../components/student/managLeaveComponent";
import singleEnrollComponent from "../components/student/singleEnrollComponent";
import groupEnrollsComponent from "../components/student/groupEnrollsComponent";
import courseAddDropComponents from "../components/student/courseAddDropComponents";
import courseGraduationComponent from "../components/student/courseGraduationComponent";
import alumniListComponent from "../components/student/alumniListComponent";
import studentNotesComponent from "../components/student/studentNotesComponent";
const route = [
    {
        path : '/admin/dashboard',
        name : 'home',
        component : dashboardComponent
    },
    {
        path : '/admin/about',
        name : 'about',
        component : About
    },
    {
        path : '/admin/product/category',
        name : 'about',
        component : categoryComponent,
        meta : {pageTitle: 'Category', dataUrl : 'api/categories'}
    },
    {
        path : '/admin/product/sub_category',
        name : 'about',
        component : subCategoryComponent,
        meta : {pageTitle: 'Sub-Category', dataUrl : 'api/sub_categories'}
    },
    {
        path : '/admin/product/product',
        name : 'about',
        component : productComponent,
    },
    {
        path : '/admin/customer/orders',
        name : 'orders',
        component : ordersComponent,
    },
    {
        path : '/admin/customer/customers',
        name : 'customers',
        component : customersComponent,
    },
    {
        path : '/admin/student/attendance/subjects',
        name : 'student-attendance',
        component : subjectsAttendanceComponent,
    },
    {
        path : '/admin/student/attendance/reports',
        name : 'student-attendance-reports',
        component : attendanceReportsComponent,
    },
    {
        path : '/admin/student/manage-leave',
        name : 'student-manage-leave',
        component : managLeaveComponent,
    },
    {
        path : '/admin/student/single-enroll',
        name : 'student-single-enroll',
        component : singleEnrollComponent,
    },
    {
        path : '/admin/student/group-enroll',
        name : 'student-group-enrolls',
        component : groupEnrollsComponent,
    },
    {
        path : '/admin/student/course-add-drop',
        name : 'student-course-add-drop',
        component : courseAddDropComponents,
    },
    {
        path : '/admin/student/course-graduation',
        name : 'student-course-graduation',
        component : courseGraduationComponent,
    },
    {
        path : '/admin/student/alumni-list',
        name : 'student-alumni-list',
        component : alumniListComponent,
    },
    {
        path : '/admin/student/student-notes',
        name : 'student-notes',
        component : studentNotesComponent,
    },



];
export default route;
