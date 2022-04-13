<template>
  <ClientForm @clientCreated="onClientCreated" />
</template>

<script>
import ClientForm from "../components/Clients/ClientForm.vue"

export default {
    name: "CreateClient",
    components: {
        ClientForm
    },
    methods: {
      onClientCreated() {
        this.$router.push({
          path: "/clients"
        })
      }
    }
}
</script>

