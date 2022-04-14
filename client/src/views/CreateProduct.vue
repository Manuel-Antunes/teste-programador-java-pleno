<template>
  <ProductForm @onSubmit="onSubmit" />
</template>

<script>
import ProductForm from "../components/Products/ProductForm.vue"
import apolloClient from "../apollo/client"
import { createProduct } from "../apollo/mutations/createProduct"

export default {
    name: "CreateProduct",
    components: {
        ProductForm
    },
    methods: {
      async onSubmit(formData) {
        try {
          const { data } = await apolloClient.mutate({
            mutation: createProduct,
            variables: formData
          })
          this.$router.push({
            path: "/products"
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

