
<template>
    <div class="container-fluid px-4">
        <page-top></page-top>
        <data-table :tableHeading="tableHeading">
            <tr v-for="(data, index) in dataList" :key="index">
                <td>{{ index + 1 }}</td>
                <td>{{ data.name }}</td>
                <td>
                    <a class="btn btn-outline-warning" @click="editCategory(data)">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-outline-danger" @click="deleteCategory(data.id)">
                        <i class="fa fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        </data-table>
        <form-modal @submit="submitForm">
            <div class="row">
                <div class="col-md-12">
                    <label>Category Name</label>
                    <input v-validate="'required'" v-model="formData.name" name="name" class="form-control" type="text">
                </div>
            </div>
        </form-modal>
    </div>
</template>

<script>
    import PageTop from "../../components/pageTop.vue";
    import DataTable from "../../components/dataTable.vue";
    import FormModal from "../../components/formModal.vue";
    import httpMixin from "../../mixins/httpMixin"; // Ensure mixins are imported
    import commonMixin from "../../mixins/commonMixin";

    export default {
        name: "categoryComponent",
        components: { FormModal, DataTable, PageTop },
        mixins: [httpMixin, commonMixin], // Register mixins
        data() {
            return {
                tableHeading: ['Sl', 'Name', 'Action']
            };
        },
        computed: {
            formData() {
                return this.$store.state.formData;
            },
            dataList() {
                return this.$store.state.dataList;
            }
        },
        mounted() {
            this.getDataList();
        },
    };
</script>

<style scoped>


</style>
