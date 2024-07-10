<template>
  <div class="max-w-md mx-auto p-6 bg-white shadow-md rounded-lg">
    <button
      @click="goBack"
      class="mb-4 flex items-center text-blue-500 hover:text-blue-700"
    >
      <svg
        class="w-6 h-6 inline-block mr-1"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M15 19l-7-7 7-7"
        ></path>
      </svg>
      Back
    </button>
    <h2 class="text-3xl font-bold mb-4 text-center text-gray-800">Invoice Details</h2>
    <div class="border p-4 rounded-lg mb-4">
      <h1 class="text-2xl font-semibold mb-2 text-gray-700">
        Invoice #{{ invoice.invoice_number }}
      </h1>
      <div class="mb-2">
        <p class="mb-1">
          <span class="font-semibold">Date:</span> {{ invoice.invoice_date }}
        </p>
        <p class="mb-1">
          <span class="font-semibold">Customer:</span> {{ invoice.customer_info }}
        </p>
        <p class="mb-1">
          <span class="font-semibold">Supplier:</span> {{ invoice.supplier_info }}
        </p>
        <p class="mb-1">
          <span class="font-semibold">Total:</span> {{ invoice.total_amount }}
        </p>
      </div>
    </div>

    <h3 class="text-xl font-semibold mt-6 mb-3 text-gray-700">Products Purchased</h3>
    <table class="w-full text-left border-collapse">
      <thead>
        <tr>
          <th class="border-b-2 py-2 px-4">#</th>
          <th class="border-b-2 py-2 px-4">Product Name</th>
          <th class="border-b-2 py-2 px-4">Quantity</th>
          <th class="border-b-2 py-2 px-4">Price</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(item, index) in invoice.items"
          :key="item.id"
          class="hover:bg-gray-100"
        >
          <td class="border-b py-2 px-4">{{ index + 1 }}.</td>
          <td class="border-b py-2 px-4">{{ item.product.name }}</td>
          <td class="border-b py-2 px-4">{{ item.quantity }}</td>
          <td class="border-b py-2 px-4">{{ item.price }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      invoice: {},
    };
  },
  created() {
    axios.get(`/api/invoices/${this.$route.params.id}`).then((response) => {
      this.invoice = response.data;
    });
  },
  methods: {
    goBack() {
      this.$router.push({ path: "/", query: { page: "invoices" } });
    },
  },
};
</script>

<style scoped>
button {
  transition: color 0.2s ease;
}
h1,
h2,
h3 {
  transition: color 0.2s ease;
}
div {
  transition: background-color 0.2s ease, border-color 0.2s ease;
}
table {
  transition: background-color 0.2s ease, border-color 0.2s ease;
}
</style>
