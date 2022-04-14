<template>
    <div>

    <div class="text-center mt-5 d-flex justify-content-between container">
        <h3>Adicionar produtos no pedido</h3>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-6">
            <p class="text-center text-decoration-underline">Lista de produtos geral</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Incluir?</th>
                    </tr>
                </thead>
                <tbody>
                     <tr v-for="(product) in nonEarnedProducts" :key="product.code">
                        <th scope="row">{{product.code && product.code.slice(0, 3) + "..."}}</th>
                        <td>{{product.name}}</td>
                        <td>{{product.price}}</td>
                        <td><input type="checkbox" @change="handleCheckbox($event, product)"/></td>
                        </tr>
                </tbody>
            </table>
        </div>
            <div class="col-6">
            <p class="text-center text-decoration-underline">Lista de produtos do pedido</p>
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
                        <th scope="row">{{product.code && product.code.slice(0, 3) + "..."}}</th>
                        <td>{{product.name}}</td>
                        <td>{{product.price}}</td>
                        <td><button class="btn btn-danger" @click="handleRemoveProduct(product.code)">Remover</button></td>
                        </tr>
                </tbody>
            </table>
        </div>
        <button class="btn btn-secondary" @click="handleUpdateOrder">Atualizar pedido</button>
     </div>  
    </div>
</div>
</template>

<script>
import apolloClient from "../apollo/client"
import { getProducts } from "../apollo/queries/getProducts"
import { getOrder } from "../apollo/queries/getOrder"
import { attachProduct } from "../apollo/mutations/attachProduct"

export default {
    name: "OrderProducts",
    data() {
        return {
            // order: {products: [{name: "Calcinha preta", price: 88, code: "1231241241"}], issue_date: "13/04/2099", id: 9238219},
            // products: [{name: "Calcinha preta", price: 88, code: "1231241241"}, {name: "Limão com mel", price: 22, code: "1324151"}],
            order: {},
            products: [],
            checkedProducts: []
        }
    },
    async mounted() {
        try {
            
            const { data: {order} } = await apolloClient.query({
                query: getOrder,
                variables: {
                    id: parseInt(this.$route.params.order_id, 10)
                },
                fetchPolicy: "no-cache"
            })

            const { data: {products} } = await apolloClient.query({
                query: getProducts,
                fetchPolicy: "no-cache"
            })
            console.log(products)
            this.order = order
            this.products = products
        } 
        catch(err) {
            console.log(JSON.stringify(err))
                this.$swal({
                icon: 'error',
                title: 'Oops...',
                text: err.message,
                })
        }
    },
    methods: {
        handleCheckbox(e, product) {
            const checked = e.target.checked
            if(checked) {
                this.checkedProducts.push(product)
            } else {
                this.checkedProducts.splice(this.checkedProducts.findIndex(p => p.code == product.code), 1)
            }
        },
        async handleUpdateOrder() {
            this.order.products.push(...this.checkedProducts)
            await apolloClient.mutate({
                mutation: attachProduct,
                variables: {
                    order_id: parseInt(this.$route.params.order_id, 10),
                    product_ids: this.order.products.map(product => product.code)

                }
            })
            this.checkedProducts = []
        },
        handleRemoveProduct(productCode) {
            this.order.products.splice(this.order.products.findIndex(p => p.code == productCode), 1)
        }
    },
    computed: {
        nonEarnedProducts() {
            return this.products.filter(product => {
                return !this.order.products.find((orderProduct) => {
                    return orderProduct.code === product.code
                })
            })
        }
    }
}
</script>

