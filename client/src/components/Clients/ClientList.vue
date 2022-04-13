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
            customers: [{name: "João", cpf: "112301423-55", phone: "(82)9999999", email:"sexo123@gmail.com", code: "123123"}]
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

