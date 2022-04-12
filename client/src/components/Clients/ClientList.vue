<template>
    <div class="text-center mt-5 mb-5 container d-flex flex-wrap">
        <!-- <p>Ainda não há clientes cadastrados</p> -->
        <ClientCard />
    </div>
</template>

<script>
import ClientCard from "./ClientCard.vue"
import apolloClient from "../../apollo/client"
import { getUsers } from "../../apollo/queries/getUsers"
import { onMounted } from '@vue/runtime-core'

onMounted(async () => {
    const { data } = await apolloClient.query(getUsers())
    console.log(data)
})

export default {
    name: "ClientList",
    components: {
        ClientCard
    },
    methods: {}
}

</script>

