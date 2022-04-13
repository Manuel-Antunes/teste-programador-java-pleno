<template>
  <!-- need to lift state up  -->
  <div class="card m-1" style="width: 16.5rem;" @click="cardClickHandler" >
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-success text-light">Jõao Carvalho</li>
    <li class="list-group-item bg-success text-light">199.188.177-53</li>
    <li class="list-group-item bg-success text-light">(99) 999776655</li>
    <li class="list-group-item bg-success text-light">joao_c@gmail.com</li>
  </ul>
</div>
</template>

<script>
export default {
    name: "ClientCard",
    methods: {
      cardClickHandler(e) {
          
      }
    }
}
</script>

