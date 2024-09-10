<template>
    <div class="container-fluid px-4">
        <page-top></page-top>
        <data-table :tableHeading="tableHeading">
            <tr v-for="(data, index) in dataList" :key="index">
                <td>{{ index+1 }}</td>
                <td>{{ data.name }}</td>
                <td>{{ getCategoryName(data.category_id) }}</td>
                <td>
                    <a class="btn btn-outline-warning" @click="editCategory(data)">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-outline-danger" @click="deleteCategory(data.id)">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        </data-table>
        <form-modal @submit="submitForm">
            <div class="row">
                <div class="col-md-12">
                    <label>SubCategory Name</label>
                    <input v-validate="'required'" v-model="formData.name" name="name" class="form-control" type="text">

                </div>
                <div class="col-md-12">
                    <label>Category</label>
                    <select v-model="formData.category_id" class="form-control">
                        <option value="" class="text-muted">Select</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                    </select>
                </div>
                <div class="col-md-12 mt-2">
                    <button @click="submitForm" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form-modal>
    </div>
</template>

<script>
    import PageTop from "../../components/pageTop.vue";
    import DataTable from "../../components/dataTable.vue";
    import axios from "axios";
    import FormModal from "../../components/formModal.vue";
    import commonMixin from '../../mixins/commonMixin.js';

    export default {
        mixins : [commonMixin],
        name: "subCategoryComponent",
        components: { FormModal, DataTable, PageTop },
        data() {
            return {
                tableHeading: ['Sl', 'Name', 'Category', 'Action'],
                categories: []
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
        methods: {
            getDataList() {
                axios.get('/api/sub_categories')
                    .then(response => {
                        this.$store.commit('dataList', response.data.result);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            },
            getCategories() {
                axios.get('/api/categories')
                    .then(response => {
                        this.categories = response.data.result;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            },
            getCategoryName(categoryId) {
                const category = this.categories.find(cat => cat.id === categoryId);
                return category ? category.name : 'N/A';
            },

            deleteCategory(id) {
                axios.delete(`/api/sub_categories/${id}`)
                    .then(response => {
                        if (response.data.status === 2000) {
                            this.getDataList();
                            this.$toast.success('SubCategory deleted successfully');
                        } else {
                            this.$toast.error('An error occurred');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        this.$toast.error('An error occurred');
                    });
            },

        },
        mounted() {
            this.getDataList();
            this.getCategories();
        },

    };
</script>

<style scoped>

</style>
