<template>
    <div class="text-center mt-5 mb-5 container d-flex flex-wrap">
        <router-link v-for="(customer) in customers" :key="customer.code" :to="'/clients/' + customer.code + '/orders'">
            <ClientCard :name="customer.name" :email="customer.email" :cpf="customer.cpf" :phone="customer.phone"/>
        </router-link>
        <p v-if="customers.length == 0">Ainda não há clientes cadastrados</p> 
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
        try {
            const { data } = await apolloClient.query({
                query: getUsers
            })
            console.log(data)
            this.customers = data.users
        }
        catch(err) {
            this.$swal({
            icon: 'error',
            title: 'Oops...',
            text: err.message,
            })
        }
    },
    methods: {}
}

</script>

