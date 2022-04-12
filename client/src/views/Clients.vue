<template>
  <div class="text-center mt-5">
    <a class="btn btn-success">Adicionar novo cliente</a>
  </div>
  <ClientForm />
</template>

<script>
import ClientForm from "../components/ClientForm.vue"

export default {
    name: "Clients",
    components: {
      ClientForm
    }
}
</script>

<style>

</style>