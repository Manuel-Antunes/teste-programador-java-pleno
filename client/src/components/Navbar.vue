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
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link class="nav-link" to="/clients">Clientes</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/products">Produtos</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/orders">Pedidos</router-link>
          </li>
        </ul>
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
