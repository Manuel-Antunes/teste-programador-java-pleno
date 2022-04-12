<template>
    <div class="text-center mt-3 container d-flex flex-wrap">
        <!-- <p>Ainda não há produtos cadastrados</p> -->
        <ProductCard />
    </div>
</template>

<script>
import ProductCard from "./ProductCard.vue"

export default {
    name: "ProductList",
    components: {
        ProductCard
    }
}
</script>

