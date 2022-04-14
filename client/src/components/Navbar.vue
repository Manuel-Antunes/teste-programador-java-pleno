<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav">
    <div class="container-fluid">
      <router-link class="navbar-brand" to="/">
        Companhia do seu Zé
      </router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div
        class="collapse navbar-collapse d-flex justify-content-end"
        id="navbarNavAltMarkup"
      >
        <div class="navbar-nav">
          <router-link class="nav-link" to="/clients">Clientes</router-link>
          <router-link class="nav-link" to="/products">Produtos</router-link>
          <router-link class="nav-link" to="/orders">Pedidos</router-link>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
  props: ["logo"],
};
</script>
