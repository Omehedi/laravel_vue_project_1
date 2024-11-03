
export default {
    data() {
        return {
            name: "",
        };
    },
    watch: {
        errors: {
            handler(eachError) {
                // Clear previous error styles and messages
                $(".is-invalid").removeClass("is-invalid");
                $(".validation_error").remove(); // Remove previous error messages

                // Loop through each validation error and apply error styles and messages
                $.each(eachError.items, function (index, eachField) {
                    var target = $("[name='" + eachField.field + "']");
                    $(target).addClass('is-invalid'); // Apply error styles directly to the input field

                    // Append error message directly to the input field
                    var errorMessage = "<span class='validation_error'>" + eachField.msg + "</span>";
                    $(target).after(errorMessage);
                });
            },
            deep: true
        }
    },
    methods: {
        openModal(modalId = 'myModal', formData = this.$store.getters.formData) {
            $(`#${modalId}`).modal('show');
            this.$store.commit('formData', formData);
        },
        closeModal(modalId = 'myModal') {
            $(`#${modalId}`).modal('hide');
            this.$store.commit('formData', {});
        },
        urlGenerate(customUrl = false) {
            const baseUrl = this.$route.meta.baseUrl || ''; // Ensure baseUrl is defined
            if (customUrl) {
                return `${baseUrl}/${customUrl}`;
            }
            return `${baseUrl}/${this.$route.meta.dataUrl}`;
        },
        showToast(message, type = "success") {
            this.$toast(message, {
                type: type,
                timeout: 3000,        // 3 seconds timeout
                position: "top-right", // Toast position at top-right
            });
        }
    }
};
