<template>
     <div class="text-center mt-5">
        <a class="btn btn-success">Adicionar novo produto</a>
    </div>
    <ProductForm />
</template>

<script>
import ProductForm from "../components/ProductForm.vue"
export default {
    name: "Products",
    components: {
      ProductForm
    }
}
</script>

<style>

</style>