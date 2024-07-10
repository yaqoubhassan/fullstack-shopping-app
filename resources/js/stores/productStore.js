// src/stores/productStore.js

import { defineStore } from 'pinia';
import axios from 'axios';

export const useProductStore = defineStore('productStore', {
  state: () => ({
    products: [],
    loading: false,
    error: null,
  }),
  actions: {
    async fetchProducts() {
      this.loading = true;
      try {
        const response = await axios.get('/api/products');
        this.products = response.data;
      } catch (error) {
        this.error = error.message;
      } finally {
        this.loading = false;
      }
    },
    clearError() {
      this.error = null;
    },
  },
  getters: {
    productCount: (state) => state.products.length,
    getProductById: (state) => (id) => state.products.find(product => product.id === id),
  },
});
