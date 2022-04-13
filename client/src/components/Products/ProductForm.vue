<template>
  <div class="container-lg">
      <div class="row justify-content-center my-5">
        <div class="col-lg-6">
          <form @submit.prevent="submit">
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
export default {
    name: "ProductForm",
    methods: {
      submit() {

        const formData = {
          description: this.description,
          unities: this.unities,
          price: this.price
        }

        this.$emit("onSubmit", formData)
      }
    }
}
</script>
