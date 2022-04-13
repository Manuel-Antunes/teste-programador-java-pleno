<template>
  <div class="container-lg mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <form @submit.prevent="submit">
            <label for="name" class="form-label mt-1 mb-1">Nome: </label>
            <div class="input-group">
              <input type="text" id="name" class="form-control" v-model="name" placeholder="João Silva" />
            </div>
            <label for="cpf" class="form-label mt-1 mb-1">CPF: </label>
            <div class="input-group">
              <input type="text" id="cpf" class="form-control" v-model="cpf" placeholder="e.g 111222333-44"/>
            </div>
            <label for="phone" class="form-label mt-1 mb-1">Telefone: </label>
            <div class="input-group">
              <input type="tel" id="phone" class="form-control" v-model="phone" placeholder="e.g (11) 999999999" />
            </div>
            <label for="email" class="form-label mt-1 mb-1">Email: </label>
            <div class="input-group">
              <input type="text" id="email" class="form-control" v-model="email" placeholder="joao_silva@email.com" />
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
    name: "ClientForm",
    methods: {
      submit() {

        const formData = {
          name: this.name,
          cpf: this.cpf,
          phone: this.phone,
          email: this.email
        }
          this.$emit("onSubmit", formData)        
      }
    },
    mounted() {
      if(this.data) {
        this.name = this.data.name
        this.cpf = this.data.cpf
        this.phone = this.data.phone
        this.email = this.data.email
      }
    },
    props: {
      data: {
        type: Object,
        required: false,
        default: undefined
      }
    }
}
</script>

