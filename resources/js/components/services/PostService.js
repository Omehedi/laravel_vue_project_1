import axios from 'axios';

const API_URL = 'http://localhost:8000/api/posts';

export  default {
    getAllPosts(){
        return axios.get(API_URL);
    },
    createPost(post){
        return axios.post(API_URL,post);
    },
    editPost(id){
        return axios.get(`${API_URL}/${id}`);
    },
    updatePost(id,post){
        return axios.put(`${API_URL}/${id}`,post);
    },
    deletePost(id){
        return axios.delete(`${API_URL}/${id}`);
    }
}