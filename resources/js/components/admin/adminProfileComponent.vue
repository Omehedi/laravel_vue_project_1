<template>
    <div class="profile-container">
        <div class="profile-tabs">
            <button>PROFILE INFO</button>
            <button>PROFILE UPDATE</button>
            <button>ACCOUNT UPDATE</button>
        </div>

        <div class="profile-content">
            <div class="profile-image-section">
                <div class="profile-image" :style="{ backgroundImage: `url(${profileImage})` }">
                    <!-- Placeholder for profile image -->
                </div>
                <h2>Super Admin</h2>
                <input type="file" @change="onFileChange" accept="image/*" />
                <button @click="uploadImage" class="upload-button">Upload Image</button>
            </div>

            <div class="profile-info">
                <div class="card personal-info">
                    <h3>Personal Information</h3>
                    <div class="profile-details">
                        <p><strong>Staff ID:</strong> 1001</p>
                        <p><strong>Email:</strong> admin@mail.com</p>
                        <p><strong>Phone:</strong> 0123456789</p>
                        <p><strong>Emergency Phone:</strong> -</p>
                        <p><strong>Father Name:</strong> ABC</p>
                        <p><strong>Mother Name:</strong> XYZ</p>
                        <p><strong>Gender:</strong> Male</p>
                        <p><strong>Date Of Birth:</strong> 01-01-2006</p>
                        <p><strong>Marital Status:</strong> Married</p>
                        <p><strong>Blood Group:</strong> A+</p>
                        <p><strong>National ID:</strong> -</p>
                        <p><strong>Passport No:</strong> -</p>
                    </div>
                </div>

                <div class="card department-info">
                    <h3>Department Information</h3>
                    <div class="profile-details">
                        <p><strong>Department:</strong> Admission</p>
                        <p><strong>Designation:</strong> Admin</p>
                        <p><strong>Joining Date:</strong> 02-10-2018</p>
                        <p><strong>Contract Type:</strong> Full Time</p>
                        <p><strong>Work Shift:</strong> Morning</p>
                        <p><strong>Salary Type:</strong> Fixed</p>
                        <p><strong>Fixed Salary:</strong> 50000 $</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AdminProfileComponent",
        data() {
            return {
                selectedImage: null,
                profileImage: '', // Add this to manage the image source
            };
        },
        methods: {
            onFileChange(event) {
                const file = event.target.files[0];
                if (file) {
                    this.selectedImage = file;
                    this.profileImage = URL.createObjectURL(file); // Preview the image
                }
            },
            async uploadImage() {
                if (!this.selectedImage) {
                    alert("Please select an image first.");
                    return;
                }

                const formData = new FormData();
                formData.append("image", this.selectedImage);

                try {
                    const response = await fetch("http://your-backend-url/api/upload-profile-image", {
                        method: "POST",
                        body: formData,
                        headers: {
                            "X-Requested-With": "XMLHttpRequest",
                        },
                    });

                    if (response.ok) {
                        const result = await response.json();
                        alert("Image uploaded successfully!");
                        // You can update the profileImage with the URL from result if needed
                    } else {
                        alert("Image upload failed.");
                    }
                } catch (error) {
                    console.error("Error uploading image:", error);
                    alert("An error occurred while uploading the image.");
                }
            },
        },
    };
</script>

<style scoped>
    .profile-container {
        font-family: Arial, sans-serif;
        max-width: 1000px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #ffffff; /* White background for a clean look */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-tabs {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .profile-tabs button {
        padding: 10px 20px;
        border: none;
        background-color: #007bff; /* Blue color */
        color: white;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .profile-tabs button:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }

    .profile-content {
        display: flex;
        gap: 20px;
    }

    .profile-image-section {
        text-align: center;
        width: 200px;
    }

    .profile-image {
        width: 100px;
        height: 100px;
        background-color: #007bff; /* Blue color for placeholder */
        border-radius: 50%;
        margin: auto;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        background-size: cover; /* Ensure the image covers the area */
        background-position: center; /* Center the image */
    }

    .upload-button {
        margin-top: 10px;
        padding: 10px 20px;
        border: none;
        background-color: #28a745; /* Green color */
        color: white;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .upload-button:hover {
        background-color: #218838; /* Darker green on hover */
    }

    .profile-info {
        flex: 1; /* Take remaining space */
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .card {
        background-color: #f8f9fa; /* Light background for cards */
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        flex: 1;
    }

    .personal-info {
        flex: 2; /* Personal info card larger */
    }

    .department-info {
        flex: 1; /* Department info card smaller */
    }

    .profile-details p {
        margin: 5px 0;
        line-height: 1.6; /* Increased line height for readability */
    }

    h3 {
        margin-bottom: 15px;
        color: #333; /* Dark text color for headings */
        border-bottom: 2px solid #007bff; /* Underline for headings */
        padding-bottom: 10px;
    }
</style>
