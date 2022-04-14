<template>
  <div class="container text-center mt-3">
    <h1>Bem vindo a companhia do seu zé</h1>
    <div>
      <p>Para começar selecione um cliente a seguir:</p>
      <div class="bg-secondary container mt-5 rounded p-2">
        <h3 class="text-light">Clientes cadastrados:</h3>
      </div>
      <ClientList />
    </div>
  </div>
</template>

<script>
import ClientList from "../components/Clients/ClientList.vue";
export default {
  name: "Home",
  components: {
    ClientList,
  },
};
</script>

<style></style>
