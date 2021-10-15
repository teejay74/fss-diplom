import { createRouter, createWebHistory } from "vue-router";
import Client from "./views/Client.vue";
import Admin from "./views/Admin"
import Login from "./views/LoginForm"
import Register from "./views/RegisterForm"
import HallPay from "./components/HallPay";
import PaymentComponent from "./components/PaymentComponent";

const routes = [
    { path: '/', component: Client },
    { path: '/admin', component: Admin },
    { path: '/login', component: Login },
    { path: '/register', component: Register },
    { path: '/hall', name: 'hall', component: HallPay, props: true },
    { path: '/payment', name: 'payment', component: PaymentComponent, props: true }

]

export default createRouter({
    history: createWebHistory(),
    routes
})
