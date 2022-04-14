<template>
  <ClientForm @onSubmit="onSubmit" :data="user" />
</template>

<script>
import ClientForm from "../components/Clients/ClientForm.vue";
import apolloClient from "../apollo/client";
import { updateUser } from "../apollo/mutations/updateUser";
import { getUser } from "../apollo/queries/getUser";

export default {
  name: "UpdateClient",
  components: {
    ClientForm,
  },
  data() {
    return {
      user: {},
    };
  },
  async mounted() {
    try {
      const code = this.$route.params.id;
      const { data } = await apolloClient.query({
        query: getUser,
        variables: {
          code,
        },
      });
      this.user = data.user;
    } catch (err) {
      this.$swal({
        icon: "error",
        title: "Oops...",
        text: err.message,
      });
    }
  },
  methods: {
    async onSubmit(formData) {
      try {
        const code = this.$route.params.id;
        await apolloClient.mutate({
          mutation: updateUser,
          variables: {
            code,
            ...formData,
          },
        });
        this.$swal("Parabéns!", "Cliente atualizado com sucesso!", "success");
        this.$router.push({
          path: `/clients/${code}/orders`,
        });
      } catch (err) {
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
