<template>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img class="fluid" alt="Vue logo" src="../assets/logo.png" width="48px"/>
            Companhia do seu Zé
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav ">
                <a class="nav-link" href="#">Clientes</a>
                <a class="nav-link" href="#">Produtos</a>
                <a class="nav-link" href="#">Pedidos</a>
            </div>
        </div>
    </div>
</nav>
</template>

<script>
    export default {
        name: "Navbar"
    }
</script>