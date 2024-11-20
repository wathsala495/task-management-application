<template>
  <div class="container">
    <form @submit.prevent="login" class="login">
       <h2 >Login</h2>
      <input type="email" v-model="email" placeholder="Email" required />
      <input type="password" v-model="password" placeholder="Password" required />
      <button type="submit" id="logbutton">Login</button>
    </form>
  </div>
</template>

<script>

import axios from 'axios';
export default {
   name: 'UserLogin',
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    async login() {
      try {
        await axios.post('/login', {
          email: this.email,
          password: this.password,
        });
        
      } catch (error) {
        console.error('Login failed:', error.response.data);
      }
    },
  },
};
</script>

<style scoped>
.login{
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
#logbutton{
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
