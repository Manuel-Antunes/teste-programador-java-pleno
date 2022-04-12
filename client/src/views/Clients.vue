<template>
  <div class="text-center mt-5">
    <h3>Adicione um novo cliente</h3>
  </div>
  <ClientForm />
  <div class="bg-secondary container mt-5 rounded p-2">
    <h3 class="text-light">Clientes cadastrados:</h3>
  </div>
  <ClientList/>
</template>

<script>
import ClientForm from "../components/Clients/ClientForm.vue"
import ClientList from "../components/Clients/ClientList.vue"

export default {
    name: "Clients",
    components: {
      ClientForm,
      ClientList
    }
}
</script>

<style>

</style>