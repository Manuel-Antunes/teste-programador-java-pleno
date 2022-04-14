<template>
    <div class="text-center mt-3 container d-flex flex-wrap">
        <div v-for="(product) in products" :key="product.code">
            <ProductCard :code="product.code" :name="product.name" :desc="product.desc" :units="product.units" :price="product.price" @onDelete="onDeleteHandler"/>
        </div>
        <p v-if="this.products.length === 0">Ainda não há produtos cadastrados</p>
    </div>
</template>

<script>
import ProductCard from "./ProductCard.vue"
import apolloClient from "../../apollo/client"
import { getProducts } from "../../apollo/queries/getProducts"

export default {
    name: "ProductList",
    components: {
        ProductCard
    },
    data() {
        return {
            products: []
        }
    },
    async mounted() {
        try {
            const { data } = await apolloClient.query({
                query: getProducts,
                fetchPolicy: "no-cache"
            })
            this.products = data.products
        } 
        catch(err) {
            this.$swal({
            icon: 'error',
            title: 'Oops...',
            text: err.message,
            })
        }
    },
    methods: {
        onDeleteHandler(code) {
            const auxProducts = [...this.products]
            auxProducts.splice(auxProducts.findIndex(c => c.code === code), 1)
            this.products = auxProducts
        }
    }

    
}
</script>

