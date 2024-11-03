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
                <textarea
                        v-model="post.content"
                        class="form-control"
                        rows="4"
                        placeholder="Content"
                        required
                ></textarea>
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
                        <p class="card-text">{{ post.content }}</p>
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

    export default {
        name: "Post",
        component:{Vue2TinymceEditor},
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
                if (this.editMode) {
                    PostService.updatePost(this.editingPostId, this.post)
                        .then(() => {
                            this.fetchPosts();
                            this.resetForm();
                        });
                } else {
                    PostService.createPost(this.post)
                        .then(() => {
                            this.fetchPosts();
                            this.resetForm();
                        });
                }
            },
            editPost(post) {
                this.post = { ...post };
                this.editMode = true;
                this.editingPostId = post.id;
            },
            deletePost(id) {
                PostService.deletePost(id)
                    .then(() => {
                        this.fetchPosts();
                    });
            },
            resetForm() {
                this.post = { title: '', content: '' };
                this.editMode = false;
                this.editingPostId = null;
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
