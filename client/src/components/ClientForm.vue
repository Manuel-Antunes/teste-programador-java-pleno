<template>
  <div class="container-lg">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <form>
            <label for="name" class="form-label"></label>
            <div class="input-group">
              <input type="text" id="name" class="form-control" placeholder="Nome" />
            </div>
            <label for="cpf" class="form-label"></label>
            <div class="input-group">
              <input type="text" id="cpf" class="form-control" placeholder="CPF"/>
            </div>
            <label for="phone" class="form-label"></label>
            <div class="input-group">
              <input type="tel" id="phone" class="form-control" placeholder="Telefone" />
            </div>
            <label for="email" class="form-label"></label>
            <div class="input-group">
              <input type="text" id="email" class="form-control" placeholder="Email" />
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
    name: "ClientForm"
}
</script>

