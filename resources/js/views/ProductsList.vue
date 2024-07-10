<template>
  <div
    v-for="product in products"
    :key="product.id"
    class="bg-white rounded-lg overflow-hidden p-2"
  >
    <img
      :src="product.image_url"
      @click="viewProduct(product.id)"
      class="w-full h-auto rounded-md cursor-pointer"
    />
    <!-- <p class="mt-2 text-center text-sm font-medium">{{ product.name }}</p> -->
  </div>
</template>

<script>
import axios from "axios";

export default {
  // props: {

  // },
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
