<template>
  <div class="container">
    <form @submit.prevent="register" class="resister">
    <h2 >Register</h2>
      <input type="text" v-model="name" placeholder="Name" required />
      <input type="email" v-model="email" placeholder="Email" required />
      <input type="password" v-model="password" placeholder="Password" required />
      <input type="password" v-model="password_confirmation" placeholder="Confirm Password" required />
      <button type="submit" id="regbutton">Register</button>
       <router-link to="/login">Go to Login</router-link>
       

    </form>
  </div>
</template>

<script>
import axios from 'axios';
export default {

name:'UserRegister',
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
    };
  },
  methods: {
    async register() {
      try {
         await axios.post('http://localhost:8000/register', {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
        });
        alert('Registration successful');
        this.$router.push('/login');
      } catch (error) {
        console.error('Registration failed:', error.response.data);
      }
    },
  },
};
</script>

<style scoped>
.resister{
    display: flex;
    flex-direction: column;
    width:50%;
    gap: 10px;
    background-color: #f0f0f0;
    padding: 20px;

}
.container{
  display:flex;
  justify-content: center;
 
}
#regbutton{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 12px;
}
</style>

