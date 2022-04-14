<template>
    <ProductForm @onSubmit="onSubmit"/>
</template>

<script>
import ProductForm from "../components/Products/ProductForm.vue"
import {updateProduct} from "../apollo/mutations/updateProduct"

export default {
    name: "UpdateProduct",
    components: {
        ProductForm
    },
    methods: {
        async onSubmit(formData) {
            try {
                const { data } = await apolloClient.mutate({
                    mutation: updateProduct,
                    variables: formData
                })
            } 
            catch(err) {
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

