<template>
    <ProductForm @onSubmit="onSubmit" :data="product"/>
</template>

<script>
import apolloClient from "../apollo/client"
import ProductForm from "../components/Products/ProductForm.vue"
import {updateProduct} from "../apollo/mutations/updateProduct"
import { getProduct } from '../apollo/queries/getProduct'

export default {
    name: "UpdateProduct",
    components: {
        ProductForm
    },
    data() {
        return {
            product: {}
        }
    },
    async mounted() {
        try {
            const code = this.$route.params.id
            const { data } = await apolloClient.query({
                query: getProduct,
                variables: {
                    code
                }
            })
            this.product = data.product
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
        async onSubmit(formData) {
            try {
                console.log(formData)
                const code = this.$route.params.id
                await apolloClient.mutate({
                    mutation: updateProduct,
                    variables: {
                        code,
                        ...formData
                    },
                })
                this.$router.push({
                    path: `/products`
                })
            } 
            catch(err) {
                console.log(JSON.stringify(err))
                this.$swal({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.message,
                })
            }   
        }
    }

}
</script>

