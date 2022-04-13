<template>
    <div class="container mt-5">
        <div class="text-center mt-5 d-flex justify-content-between container">
            <h3>Pedidos do cliente: {{customer.name}}</h3>
        </div>
        <ul class="list-group">
        <li v-for="(order) in customer.orders" :key="order.code" class="list-group-item">
            <span>{{order.issue_date}}</span>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                    </tr>
                </thead>
                <tbody>
                     <tr v-for="(product) in order.products" :key="product.code">
                        <th scope="row">{{product.code}}</th>
                        <td>{{product.name}}</td>
                        <td>{{product.price}}</td>
                        </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
                <router-link :to="`/clients/${customer.code}/orders/${order.id}/products/add`">
                    <button class="btn btn-secondary">Adicionar produtos</button>
                </router-link>
            </div>
        </li>
    </ul>
    </div>
</template>

<script>
export default {
    name: "ClientOrders",
    data() {
        return {
            customer: {name: "João", cpf: "112301423-55", phone: "(82)9999999", email:"sexo123@gmail.com", code: "123123", orders: [{products: [{name: "Calcinha preta", price: 88}], issue_date: "13/04/2099", id: 9238219}]}
        }
    }
}
</script>

