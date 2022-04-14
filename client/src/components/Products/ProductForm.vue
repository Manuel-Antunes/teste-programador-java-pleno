<template>
  <div class="container-lg">
      <div class="row justify-content-center my-5">
        <div class="col-lg-6">
          <form @submit.prevent="submit">
            <label for="name" class="form-label"></label>
            <div class="input-group">
              <input type="text" id="name" class="form-control" v-model="name" placeholder="Nome do produto"/>
            </div>
            <label for="description" class="form-label"></label>
            <div class="input-group">
              <input type="text" id="description" class="form-control" v-model="description" placeholder="Descrição do produto"/>
            </div>
            <label for="units" class="form-label"></label>
            <div class="input-group">
              <input type="number" id="units" class="form-control" v-model="units" placeholder="Unidades" />
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
    data() {
      return {
        name: null,
        description: null,
        units: null,
        price: null
      }
    },
    methods: {
      submit() {

        const formData = {
          name: this.name,
          description: this.description,
          units: this.units,
          price: this.price
        }

        this.$emit("onSubmit", formData)
      }
    },
    watch: {
      data() {
        if(this.data) {
          this.name = this.data.name
          this.description = this.data.desc
          this.units = this.data.units
          this.price = this.data.price
        }
      }
    },
    props: {
      data: {
        type: Object,
        required: false
      }
    }
}
</script>
