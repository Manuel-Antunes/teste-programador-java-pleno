<template>
  <div class="container-lg">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <form @submit="createClient" method="PUT">
            <label for="name" class="form-label"></label>
            <div class="input-group">
              <input type="text" id="name" class="form-control" v-model="name" placeholder="Nome" />
            </div>
            <label for="cpf" class="form-label"></label>
            <div class="input-group">
              <input type="text" id="cpf" class="form-control" v-model="cpf" placeholder="CPF"/>
            </div>
            <label for="phone" class="form-label"></label>
            <div class="input-group">
              <input type="tel" id="phone" class="form-control" v-model="phone" placeholder="Telefone" />
            </div>
            <label for="email" class="form-label"></label>
            <div class="input-group">
              <input type="text" id="email" class="form-control" v-model="email" placeholder="Email" />
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
import { createUser } from "../../apollo/mutations/createUser"


export default {
    name: "ClientForm",
    methods: {
      async createClient(e) {
        e.preventDefault()

        const dataForm = {
          name: this.name,
          cpf: this.cpf,
          phone: this.phone,
          email: this.email
        }

        const { data } = await apolloClient.mutate(createUser(dataForm))
      }
    }
}
</script>

