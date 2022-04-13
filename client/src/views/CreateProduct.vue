<template>
  <ProductForm @productCreated="onProductCreated" />
</template>

<script>
import ProductForm from "../components/Products/ProductForm.vue"
export default {
    name: "CreateProduct",
    components: {
        ProductForm
    },
    methods: {
      onProductCreated() {
        this.$router.push({
          path: "/products"
        })
      }
    }
}
</script>

