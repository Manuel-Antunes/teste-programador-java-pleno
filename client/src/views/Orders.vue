<template>
    <div class="container mt-5">
        <div class="text-center mt-5 d-flex justify-content-between container">
            <h3>Pedidos</h3>
        </div>
        <p v-if="!orders || orders.length == 0" class="text-center mt-5">Nenhum pedido feito por esse cliente</p>
        <ul class="list-group" v-else>
        <li v-for="(order) in orders" :key="order.code" class="list-group-item">
          <div class="d-flex justify-content-between">
                <span>Data de emissão: {{order.issue_date}}</span>
                <span>Valor total: {{order.total_price.toLocaleString("pt-br", {style: "currency", currency: "BRL"})}}</span>
          </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <p v-if="order.products.length === 0" class="fw-bold mt-5">Não há produtos nesse pedido</p>
                     <tr v-for="(product) in order.products" :key="product.code">
                        <th scope="row">{{product.code}}</th>
                        <td>{{product.name}}</td>
                        <td>{{product.price.toLocaleString("pt-br", {style: "currency", currency: "BRL"})}}</td>
                        </tr>
                </tbody>
            </table>
        </li>
    </ul>
    </div>
</template>

<script>
import apolloClient from "../apollo/client"
import { getOrders } from "../apollo/queries/getOrders"

export default {
    name: "Orders",
    data() {
        return {
            orders: []
        }
    },
   async mounted() {
        const code = this.$route.params.id
        const { data } = await apolloClient.query({
            query: getOrders,
            fetchPolicy: "no-cache"
        })
        this.orders = data.orders
    }
}
</script>

