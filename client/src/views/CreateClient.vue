<template>
  <ClientForm @onSubmit="onSubmit" />
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
      async onSubmit(formData) {
        try {
          const { data } = await apolloClient.mutate({
            mutation: createUser,
            variables: formData
          })
          console.log(data)
          this.$router.push({
            path: "/clients"
          })
        } 
        catch(err) {
          console.log(JSON.stringify(err))
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

