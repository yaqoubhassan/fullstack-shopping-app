<template>
  <div class="max-w-md mx-auto p-4 bg-white shadow-md rounded-lg">
    <div class="flex justify-between mb-4">
      <button
        @click="navigateTo('products')"
        :class="{
          'bg-blue-500 text-white': activePage === 'products',
          'bg-gray-200 text-gray-800': activePage !== 'products',
        }"
        class="py-2 px-4 rounded-lg"
      >
        Products
      </button>
      <button
        @click="navigateTo('invoices')"
        :class="{
          'bg-blue-500 text-white': activePage === 'invoices',
          'bg-gray-200 text-gray-800': activePage !== 'invoices',
        }"
        class="py-2 px-4 rounded-lg"
      >
        Invoices
      </button>
    </div>
    <div v-if="activePage === 'products'" class="grid grid-cols-2 gap-4">
      <ProductsList />
    </div>
    <div v-if="activePage === 'invoices'">
      <InvoicesList />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import ProductsList from "./ProductsList.vue";
import InvoicesList from "./InvoicesList.vue";

export default {
  components: {
    ProductsList,
    InvoicesList,
  },
  data() {
    return {
      products: [],
      activePage: "products",
    };
  },
  created() {
    axios.get("/api/products").then((response) => {
      this.products = response.data;
    });
    const page = this.$route.query.page;
    if (page) {
      this.activePage = page;
    }
  },
  methods: {
    viewProduct(id) {
      this.$router.push(`/products/${id}`);
    },
    navigateTo(page) {
      this.activePage = page;
    },
  },
};
</script>

<style>
.masonry {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 10px;
}
.masonry-item {
  background: #fff;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.masonry-item img {
  width: 100%;
  height: auto;
}
</style>
