<template>
  <!-- <div class="max-w-md mx-auto p-4 bg-white rounded-lg"> -->
  <h2 class="text-2xl font-bold mb-4 text-center">Invoices</h2>
  <ul>
    <li
      v-for="invoice in invoices"
      :key="invoice.id"
      @click="viewInvoice(invoice.id)"
      class="bg-gray-100 hover:bg-gray-200 rounded-lg p-4 mb-2 cursor-pointer shadow-sm flex justify-between items-center"
    >
      <span class="text-lg font-medium">{{ invoice.invoice_number }}</span>
      <span class="text-sm text-gray-600">{{ formatDate(invoice.invoice_date) }}</span>
    </li>
  </ul>
  <!-- </div> -->
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      invoices: [],
    };
  },
  created() {
    axios.get("/api/invoices").then((response) => {
      this.invoices = response.data;
    });
  },
  methods: {
    viewInvoice(id) {
      this.$router.push(`/invoices/${id}`);
    },
    formatDate(date) {
      const options = { year: "numeric", month: "short", day: "numeric" };
      return new Date(date).toLocaleDateString(undefined, options);
    },
  },
};
</script>
