import { createRouter, createWebHistory } from "vue-router"

import Home from "../views/Home.vue"
import Clients from "../views/Clients.vue"
import Products from "../views/Products.vue"
import Orders from "../views/Orders.vue"

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home
    },
    {
        path: "/clients",
        name: "Clients",
        component: Clients
    },
    {
        path: "/products",
        name: "Products",
        component: Products
    },
    {
        path: "/orders",
        name: "Orders",
        component: Orders
    }
]

const router = createRouter({
    history: createWebHistory(import.meta.BASE_URL), // change process.env to import.meta when using vite
    routes
})

export default router

