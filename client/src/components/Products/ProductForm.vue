<template>
  <div class="container-lg">
      <div class="row justify-content-center my-5">
        <div class="col-lg-6">
          <form @submit.prevent="createProductHandler">
            <label for="description" class="form-label"></label>
            <div class="input-group">
              <input type="text" id="description" class="form-control" v-model="description" placeholder="Nome do produto"/>
            </div>
            <label for="unities" class="form-label"></label>
            <div class="input-group">
              <input type="number" id="unities" class="form-control" v-model="unities" placeholder="Unidades" />
            </div>
            <label for="price" class="form-label"></label>
            <div class="input-group">
              <input type="number" id="price" class="form-control" v-model="price" placeholder="Valor" />
            </div>
            <div class="mt-4 text-center">
              <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</template>

<script>
import apolloClient from "../../apollo/client"
import { createProduct } from "../../apollo/mutations/createProduct"

export default {
    name: "ProductForm",
    methods: {
      async createProductHandler() {

        const formData = {
          description: this.description,
          unities: this.unities,
          price: this.price
        }

        try {
          const { data } = await apolloClient.mutate(createProduct(formData))
          this.$emit("productCreated", data)
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
