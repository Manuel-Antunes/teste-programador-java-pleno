<template>
  <ClientForm @onSubmit="onSubmit(formData)" />
</template>

<script>
import ClientForm from "../components/Clients/ClientForm.vue"
import apolloClient from "../apollo/client"
import { createUser } from "../apollo/mutations/createUser"

export default {
    name: "CreateClient",
    components: {
        ClientForm
    },
    methods: {
      async onSubmit() {
        try {
          const { data } = await apolloClient.mutate(createUser(formData))
        } 
        catch(err) {
          this.$swal({
                icon: 'error',
                title: 'Oops...',
                text: err.message,
          })
        }

        this.$router.push({
          path: "/clients"
        })
      }
    }
}
</script>

