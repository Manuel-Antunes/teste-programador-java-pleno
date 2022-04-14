<template>
  <OrderForm @onSubmit="onSubmit" />
</template>

<script>
import OrderForm from "../components/Orders/OrderForm.vue";
import apolloClient from "../apollo/client";
import { createOrder } from "../apollo/mutations/createOrder";

export default {
  name: "CreateOrder",
  components: {
    OrderForm,
  },
  methods: {
    async onSubmit(formData) {
      try {
        const code = this.$route.params.id;
        await apolloClient.mutate({
          mutation: createOrder,
          variables: {
            code,
            product_ids: [],
            ...formData,
          },
        });
        this.$swal("Parabéns!", "Pedido criado com sucesso!", "success");
        this.$router.push({
          path: `/clients/${code}/orders`,
        });
      } catch (err) {
        console.log(JSON.stringify(err));
        this.$swal({
          icon: "error",
          title: "Oops...",
          text: err.message,
        });
      }
    },
  },
};
</script>
