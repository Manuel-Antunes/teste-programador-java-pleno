<template>
    <div class="text-center mt-5 mb-5 container d-flex flex-wrap">
        <!-- <p>Ainda não há clientes cadastrados</p> -->
        <ClientCard />
    </div>
</template>

<script>
import ClientCard from "./ClientCard.vue"

export default {
    name: "ClientList",
    components: {
        ClientCard
    }
}
</script>

