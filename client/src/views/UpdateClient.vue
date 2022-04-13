<template>
    <ClientForm @onSubmit="onSubmit"/>
</template>

<script>
import ClientForm from "../components/Clients/ClientForm.vue"
import apolloClient from "../apollo/client"
import { updateUser } from "../apollo/mutations/updateUser"

export default {
    name: "UpdateClient",
    components: {
        ClientForm
    },
    data() {
        return {
            user: {
                name: "Manuel ChupaPikax",
                cpf: "112301423-55",
                phone: "(65) 99999999",
                email: "manuelchupabem@email.com"
            }
        }
    },
    methods: {
        async onSubmit() {
            try {
                const {data} = await apolloClient.mutate(updateUser(formData))
            } 
            catch(err) {
                this.$swal({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.message,
                })
            }   
        }
    }
}
</script>

