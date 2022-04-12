<template>
    <div class="text-center mt-5">
      <h3>Adicione um novo produto</h3>
    </div>  
    <ProductForm />
    <div class="bg-secondary container mt-5 rounded p-2">
      <h3 class="text-light">Produtos cadastrados:</h3>
    </div>
    <ProductList />
</template>

<script>
import ProductForm from "../components/Products/ProductForm.vue"
import ProductList from "../components/Products/ProductList.vue"

export default {
    name: "Products",
    components: {
      ProductForm,
      ProductList
    }
}
</script>

<style>

</style>