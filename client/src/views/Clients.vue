<template>
  <div class="text-center mt-5 d-flex justify-content-between container">
    <h3>Adicione um novo cliente</h3>
    <router-link class="btn btn-success" to="/clients/create">Adicionar</router-link>
  </div>
  <div class="bg-secondary container mt-5 rounded p-2">
    <h3 class="text-light">Clientes cadastrados:</h3>
  </div>
  <ClientList/>
</template>

<script>
import ClientList from "../components/Clients/ClientList.vue"
import { getUsers } from "../apollo/queries/getUsers"

export default {
    name: "Clients",
    components: {
      ClientList
    },
    
}
</script>

<style>

</style>