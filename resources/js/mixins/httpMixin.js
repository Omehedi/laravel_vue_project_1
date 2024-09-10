
import axios from "axios";

export default {
    methods: {
        getDataList() {
            axios.get(this.urlGenerate())
                .then((response) => {
                    if (response.data.status === 2000) {
                        this.$store.commit('dataList', response.data.result);
                    } else {
                        this.$toast.error('Failed to fetch categories');
                    }
                })
                .catch((error) => {
                    console.error(error.response.data.errors);
                    this.$toast.error('An error occurred while fetching categories');
                });
        },
        submitForm() {
            const _this = this;

            // Validate form data
            this.$validator.validateAll().then(valid => {
                if (valid) {
                    // Determine the API URL and method based on the presence of formData.id
                    const url = this.formData.id ? `${_this.urlGenerate()}/${_this.formData.id}` : _this.urlGenerate();
                    const method = this.formData.id ? 'put' : 'post';

                    // Make the API request
                    axios({ method, url, data: this.formData })
                        .then(response => {
                            if (parseInt(response.data.status) === 2000) {
                                _this.getDataList(); // Refresh the data list
                                _this.$toast.success(this.formData.id ? 'Category updated successfully' : 'Category added successfully');
                                _this.closeModal(); // Close the modal
                            } else {
                                _this.$toast.error('An error occurred: ' + response.data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error.response ? error.response.data.errors : error.message);
                            _this.$toast.error('An error occurred during form submission');
                        });
                }
            });
        },


        editCategory(entity, type) {
            // Create a deep copy of the entity to avoid mutating the original
            let entityData = Object.assign({}, entity);
            // Set the entity type dynamically
            entityData.type = type;

            // Commit to the store for both categories and subcategories
            this.$store.commit('formData', entityData);
            this.openModal('myModal', this.$store.getters.formData);
        },


        deleteCategory(id, type) {
            // Determine the correct API endpoint based on the type
            const endpoint = type === 'Sub-Category' ? `/api/sub_categories/${id}` : `/api/categories/${id}`;

            axios.delete(endpoint)
                .then(response => {
                    if (response.data.status === 2000) {
                        this.getDataList(); // Refresh the data list
                        this.$toast.success(type === 'Sub-Category' ? 'SubCategory deleted successfully' : 'Category deleted successfully');
                    } else {
                        this.$toast.error('An error occurred');
                    }
                })
                .catch(error => {
                    console.error(error.response ? error.response.data.errors : error.message);
                    this.$toast.error('An error occurred');
                });
        },

    },
};



