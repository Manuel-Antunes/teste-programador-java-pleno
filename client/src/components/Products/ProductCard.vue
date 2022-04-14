<template>
  <div class="card m-1" style="width: 15rem;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item bg-success text-light">{{name}}</li>
        <li class="list-group-item bg-success text-light">{{desc}}</li>
        <li class="list-group-item bg-success text-light">{{units}} unidades</li>
        <li class="list-group-item bg-success text-light">R$ {{price}}</li>
        <li class="list-group-item bg-secondary text-light">
          <div class="d-flex justify-content-around">
            <button class="btn btn-light">Editar</button>
            <button class="btn btn-danger">Excluir</button>
          </div>
        </li>

    </ul>
  </div>
</template>

<script>
export default {
    name: "ProductCard",
    props: {
      name: {
        type: String,
        required: true
      },
      desc: {
        type: String,
        required: true
      }, 
      units: {
        type: Number,
        required: true
      },
      price: {
        type: Number,
        required: true
      }

    }
}
</script>

