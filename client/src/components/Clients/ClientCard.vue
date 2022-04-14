<template>
  <!-- need to lift state up  -->
  <div class="card m-1" style="width: 16.5rem">
    <ul class="list-group list-group-flush">
      <li class="list-group-item bg-success text-light">{{ name }}</li>
      <li class="list-group-item bg-success text-light">{{ cpf }}</li>
      <li class="list-group-item bg-success text-light">{{ phone }}</li>
      <li class="list-group-item bg-success text-light">{{ email }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "ClientCard",
  methods: {},
  props: {
    name: {
      type: String,
      required: true,
    },
    cpf: {
      type: String,
      required: true,
    },
    phone: {
      type: String,
      required: true,
    },
    email: {
      type: String,
      required: true,
    },
  },
};
</script>
