<template>
<div>
   <div class="text-center mt-5 d-flex justify-content-between container">
      <h3>Adicione um novo produto</h3>
      <router-link class="btn btn-success" to="/products/create">Adicionar</router-link>
   </div>
    <div class="bg-secondary container mt-5 rounded p-2">
      <h3 class="text-light">Produtos cadastrados:</h3>
    </div>
    <ProductList />
</div>

</template>

<script>
import ProductList from "../components/Products/ProductList.vue"
import { getProducts } from "../apollo/queries/getProducts"

export default {
    name: "Products",
    components: {
      ProductList
    }
}
</script>

<style>

</style>