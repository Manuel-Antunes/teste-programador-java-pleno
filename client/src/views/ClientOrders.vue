<template>
  <div class="container mt-5">
    <div
      class="text-center mt-5 d-flex justify-content-between container flex-column flex-md-row"
    >
      <h3>Pedidos do cliente: {{ customer.user_name }}</h3>
      <div class="d-flex justify-content-around">
        <router-link :to="`/clients/${customer.code}/edit`">
          <button class="btn btn-outline-secondary me-md-3">
            Editar dados do cliente
          </button>
        </router-link>
        <button class="btn btn-outline-danger" @click="handleDelete">
          Excluir cliente
        </button>
      </div>
    </div>
    <p
      v-if="!customer.orders || customer.orders.length == 0"
      class="text-center mt-5"
    >
      Nenhum pedido feito por esse cliente
    </p>
    <ul class="list-group" v-else>
      <li
        v-for="order in customer.orders"
        :key="order.code"
        class="list-group-item"
      >
        <div class="d-flex justify-content-between">
          <span>Data de emissão: {{ order.issue_date }}</span>
          <span
            >Valor total:
            {{
              order.total_price.toLocaleString("pt-br", {
                style: "currency",
                currency: "BRL",
              })
            }}</span
          >
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
              </tr>
            </thead>
            <tbody>
              <p v-if="order.products.length === 0" class="fw-bold mt-5">
                Não há produtos nesse pedido
              </p>
              <tr v-for="product in order.products" :key="product.code">
                <th scope="row">
                  {{ product.code }}
                </th>
                <td>{{ product.name }}</td>
                <td>
                  {{
                    product.price.toLocaleString("pt-br", {
                      style: "currency",
                      currency: "BRL",
                    })
                  }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
          <router-link
            :to="`/clients/${customer.code}/orders/${order.number}/products/add`"
          >
            <button class="btn btn-secondary">Adicionar produtos</button>
          </router-link>
        </div>
      </li>
    </ul>
    <router-link :to="`/clients/${customer.code}/orders/add`">
      <button class="btn btn-success w-100">Adicionar pedido</button>
    </router-link>
  </div>
</template>

<script>
import apolloClient from "../apollo/client";
import { getUser } from "../apollo/queries/getUser";
import { deleteUser } from "../apollo/mutations/deleteUser";

export default {
  name: "ClientOrders",
  data() {
    return {
      customer: {},
    };
  },
  methods: {
    async handleDelete() {
      try {
        this.$swal({
          title: "Tem certeza ?",
          text: "Você não será capaz de reverter isso!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Sim, deletar!",
          cancelButtonText: "Cancelar",
        }).then(async (result) => {
          if (result.isConfirmed) {
            this.$swal(
              "Excluído!",
              "o cliente foi deletado com sucesso",
              "success"
            );
            await apolloClient.mutate({
              mutation: deleteUser,
              variables: {
                code: this.$route.params.id,
              },
              fetchPolicy: "no-cache",
            });
            this.$router.push({
              path: "/clients",
            });
          }
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
  async mounted() {
    const code = this.$route.params.id;
    const { data } = await apolloClient.query({
      query: getUser,
      variables: {
        code,
      },
      fetchPolicy: "no-cache",
    });
    this.customer = data.user;
  },
};
</script>
