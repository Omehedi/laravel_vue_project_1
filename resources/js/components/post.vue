<template>
    <div class="container my-4">
        <h1 class="text-center mb-4">Posts</h1>

        <!-- Post Form -->
        <form @submit.prevent="savePost" class="mb-5">
            <div class="mb-3">
                <input
                        v-model="post.title"
                        class="form-control"
                        placeholder="Title"
                        required
                />
            </div>
            <div class="mb-3">
                <vue2-tinymce-editor
                        v-model="post.content"
                        class="form-control"
                        rows="4"
                        placeholder="Content"
                        required
                ></vue2-tinymce-editor>
            </div>
            <button type="submit" class="btn btn-primary w-100">
                {{ editMode ? 'Update' : 'Create' }} Post
            </button>
        </form>

        <!-- Post List -->
        <div class="row">
            <div v-for="post in posts" :key="post.id" class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title">{{ post.title }}</h3>
                        <p class="card-text" v-html="post.content"></p> <!-- Render HTML safely -->
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button @click="editPost(post)" class="btn btn-sm btn-warning">
                            Edit
                        </button>
                        <button @click="deletePost(post.id)" class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PostService from './services/PostService';
    import Vue2TinymceEditor from "vue2-tinymce-editor/src/lib-components/Vue2TinymceEditor";
    import DOMPurify from 'dompurify';
    import commonMixin from "../mixins/commonMixin"

    export default {
        name: "Post",
        components: { Vue2TinymceEditor },
        mixins: [commonMixin],
        data() {
            return {
                posts: [],
                post: { title: '', content: '' },
                editMode: false,
                editingPostId: null
            };
        },
        created() {
            this.fetchPosts();
        },
        methods: {
            fetchPosts() {
                PostService.getAllPosts()
                    .then(response => {
                        this.posts = response.data;
                    });
            },
            savePost() {
                // Sanitize the content from TinyMCE before saving
                this.post.content = DOMPurify.sanitize(this.post.content);

                const saveAction = this.editMode
                    ? PostService.updatePost(this.editingPostId, this.post)
                    : PostService.createPost(this.post);

                saveAction
                    .then(() => {
                        this.fetchPosts();
                        this.resetForm();
                        this.showToast(this.editMode ? 'Post updated successfully' : 'Post created successfully');
                    })
                    .catch(error => {
                        console.error("There was an error saving the post:", error);
                    });
            },
            editPost(post) {
                this.post = { ...post };  // Copy the post to the form
                this.editMode = true;      // Enable edit mode
                this.editingPostId = post.id; // Set the ID of the post being edited
            },
            deletePost(id) {
                PostService.deletePost(id)
                    .then(() => {
                        this.fetchPosts(); // Refresh the post list
                        this.showToast('Post deleted successfully');
                    })
                    .catch(error => {
                        console.error("There was an error deleting the post:", error);
                    });
            },
            resetForm() {
                this.post = { title: '', content: '' }; // Reset the post object
                this.editMode = false; // Reset edit mode
                this.editingPostId = null; // Clear the editing ID
            }
        }
    };
</script>

<style scoped>
    h1 {
        font-weight: bold;
    }

    .card {
        border-radius: 8px;
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.25rem;
    }

    .card-footer {
        background-color: #f8f9fa;
    }

    .btn-warning {
        color: #fff;
    }
</style>
