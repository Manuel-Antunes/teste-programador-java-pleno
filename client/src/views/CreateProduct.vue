<template>
  <ProductForm @onSubmit="onSubmit" />
</template>

<script>
import ProductForm from "../components/Products/ProductForm.vue"
export default {
    name: "CreateProduct",
    components: {
        ProductForm
    },
    methods: {
      onSubmit() {
        try {
          const { data } = await apolloClient.mutate(createProduct(formData))
        } 
        catch(err) {
          this.$swal({
              icon: 'error',
              title: 'Oops...',
              text: err.message,
          })
        }
        this.$router.push({
          path: "/products"
        })
      }
    }
}
</script>

