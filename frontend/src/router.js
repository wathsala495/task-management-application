import { createRouter ,createWebHistory} from 'vue-router'; 
import UserRegister from './components/UserRegister.vue'
import UserLogin from './components/UserLogin.vue'


const routes = [
   
    {
        path:'/',
        component:UserRegister
    },
    {
        path:'/login',
        component:UserLogin
    },
    
]

const router = createRouter({
    history: createWebHistory(), 
    routes,
    
});
export default router;