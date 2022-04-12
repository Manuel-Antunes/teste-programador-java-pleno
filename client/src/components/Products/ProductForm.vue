<template>
  <div class="container-lg">
      <div class="row justify-content-center my-5">
        <div class="col-lg-6">
          <form>
            <label for="description" class="form-label"></label>
            <div class="input-group">
              <input type="text" id="description" class="form-control" placeholder="Nome do produto"/>
            </div>
            <label for="unities" class="form-label"></label>
            <div class="input-group">
              <input type="number" id="unities" class="form-control" placeholder="Unidades" />
            </div>
            <label for="p_value" class="form-label"></label>
            <div class="input-group">
              <input type="number" id="p_value" class="form-control" placeholder="Valor" />
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
    name: "ProductForm"
}
</script>
