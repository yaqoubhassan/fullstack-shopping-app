<template>
  <div class="max-w-md mx-auto p-4 bg-white rounded-lg shadow-lg">
    <button @click="goBack" class="mb-4 text-blue-500 hover:text-blue-700">
      <svg
        class="w-6 h-6 inline-block"
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
    <img :src="product.image_url" class="w-full h-auto rounded-md mb-4" />
    <h1 class="text-2xl font-semibold mb-2">{{ product.name }}</h1>
    <p class="text-gray-700 mb-4">{{ product.description }}</p>
    <p class="text-lg font-medium text-gray-900 mb-4">{{ product.price }}</p>
    <button
      @click="addToCart"
      class="w-full py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600"
    >
      Add to Cart
    </button>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      product: {},
    };
  },
  created() {
    axios.get(`/api/products/${this.$route.params.id}`).then((response) => {
      this.product = response.data;
    });
  },
  methods: {
    goBack() {
      this.$router.push({ path: "/", query: { page: "products" } });
    },
    addToCart() {
      alert("Added to Cart");
    },
  },
};
</script>

<style>
.banner {
  width: 100%;
  height: auto;
}
</style>
