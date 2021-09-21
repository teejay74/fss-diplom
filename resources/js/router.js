import { createRouter, createWebHistory } from "vue-router";
import Client from "./views/Client.vue";
import Admin from "./views/Admin"
import Login from "./views/LoginForm"
import Register from "./views/RegisterForm"

const routes = [
    { path: '/', component: Client },
    { path: '/admin', component: Admin },
    { path: '/login', component: Login },
    { path: '/register', component: Register }

]

export default createRouter({
    history: createWebHistory(),
    routes
})
