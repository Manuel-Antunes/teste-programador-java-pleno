<template>
  <div class="container-lg mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <form @submit.prevent="submit">
          <label for="desc" class="form-label mt-1 mb-1"
            >Descrição do pedido:
          </label>
          <div class="input-group">
            <input
              type="text"
              id="desc"
              class="form-control"
              v-model="desc"
              placeholder="..."
            />
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
  name: "OrderForm",
  data() {
    return {
      desc: null,
    };
  },
  methods: {
    submit() {
      const formData = {
        desc: this.desc,
      };

      this.$emit("onSubmit", formData);
    },
  },
};
</script>
