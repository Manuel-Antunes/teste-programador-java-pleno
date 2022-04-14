<template>
  <div class="card m-1" style="width: 15rem;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item bg-success text-light">{{name}}</li>
        <li class="list-group-item bg-success text-light">{{desc}}</li>
        <li class="list-group-item bg-success text-light">{{units}} unidades</li>
        <li class="list-group-item bg-success text-light">R$ {{price}}</li>
        <li class="list-group-item bg-secondary text-light">
          <div class="d-flex justify-content-around">
            <router-link :to="`/products/${this.code}/edit`">
              <button class="btn btn-light">Editar</button>
            </router-link>
            <button class="btn btn-danger" @click="handleDelete">Excluir</button>
          </div>
        </li>

    </ul>
  </div>
</template>

<script>
import apolloClient from "../../apollo/client"
import { deleteProduct } from "../../apollo/mutations/deleteProduct"

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
      },
      code: {
        type: String,
        required: true
      }
    },
    methods: {
      async handleDelete() {
        try {
          await apolloClient.mutate({
              mutation: deleteProduct,
              variables: {
                code: this.code
              }
          })
          this.$emit("onDelete", this.code)
        } 
        catch(err) {
          this.$swal({
              icon: 'error',
              title: 'Oops...',
              text: err.message,
          })
        }
      }
    }
}
</script>

