import { createRouter, createWebHistory } from "vue-router"

import Home from "../views/Home.vue"
import Clients from "../views/Clients.vue"
import Products from "../views/Products.vue"
import Orders from "../views/Orders.vue"
import CreateClient from "../views/CreateClient.vue"
import CreateProduct from "../views/CreateProduct.vue"
import ClientOrders from "../views/ClientOrders.vue"
import OrderProducts from "../views/OrderProducts.vue"
import UpdateClient from "../views/UpdateClient.vue"
import UpdateProduct from "../views/UpdateProduct.vue"

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
    },
    {
        path: "/clients/create",
        name: "CreateClient",
        component: CreateClient
    },
    {
        path: "/products/create",
        name: "CreateProduct",
        component: CreateProduct
    },
    {
        path: "/clients/:id/orders",
        name: "ClientOrders",
        component: ClientOrders
    },
    {
        path: "/clients/:id/orders/:order_id/products/add",
        name: "OrderProducts",
        component: OrderProducts
    },
    {
        path: "/clients/:id/edit",
        name: "UpdateClient",
        component: UpdateClient
    },
    {
        path: "/products/:id/edit",
        name: "UpdateProduct",
        component: UpdateProduct
    }
]

const router = createRouter({
    history: createWebHistory(import.meta.BASE_URL), // change process.env to import.meta when using vite
    routes
})

export default router

