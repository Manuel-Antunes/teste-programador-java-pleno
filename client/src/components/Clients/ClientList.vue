<template>
    <div class="text-center mt-5 mb-5 container d-flex flex-wrap">
        <!-- <p>Ainda não há clientes cadastrados</p> -->
        <!-- v-for for each card passing data via props -->
        <ClientCard />
    </div>
</template>

<script>
import ClientCard from "./ClientCard.vue"
import apolloClient from "../../apollo/client"
import { getUsers } from "../../apollo/queries/getUsers"

export default {
    name: "ClientList",
    components: {
        ClientCard
    },
    data(){
        return {
            customers: []
        }
    },
    async mounted() {
        const { data } = await apolloClient.query(getUsers())
        for(cust of data) {
            this.customers.push(cust)
        }
    },
    methods: {}
}

</script>

