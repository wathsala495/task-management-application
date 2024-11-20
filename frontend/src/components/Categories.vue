<template>
  <div>
    <h1>Categories</h1>
    <form @submit.prevent="saveCategory">
      <input v-model="form.name" type="text" placeholder="Category Name" required />
      <textarea v-model="form.description" placeholder="Description"></textarea>
      <button type="submit">{{ isEditing ? "Update" : "Add" }} Category</button>
    </form>

    <ul>
      <li v-for="category in categories" :key="category.id">
        <strong>{{ category.name }}</strong>
        <p>{{ category.description }}</p>
        <button @click="editCategory(category)">Edit</button>
        <button @click="deleteCategory(category.id)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      categories: [],
      form: {
        
        name: '',
        description: '',
      },
      isEditing: false,
    };
  },
  methods: {
    async fetchCategories() {
      try {
        const response = await axios.get('http://localhost:8000/api/categories');
        this.categories = response.data;
      } catch (error) {
        console.error(error);
      }
    },
    async saveCategory() {
      try {
        if (this.isEditing) {
          
          await axios.put(`http://localhost:8000/api/categories/${this.form.id}`, this.form);
        } else {
         
          await axios.post('http://localhost:8000/api/categories', this.form);
        }
        this.resetForm();
        this.fetchCategories();
      } catch (error) {
        console.error(error);
      }
    },
    editCategory(category) {
      this.isEditing = true;
      this.form = { ...category };
    },
    async deleteCategory(id) {
      try {
        await axios.delete(`http://localhost:8000/api/categories/${id}`);
        this.fetchCategories();
      } catch (error) {
        console.error(error);
      }
    },
    resetForm() {
      this.form = { id: null, name: '', description: '' };
      this.isEditing = false;
    },
  },
  mounted() {
    this.fetchCategories();
  },
};
</script>

<style>
/* Add your styles here */
</style>
