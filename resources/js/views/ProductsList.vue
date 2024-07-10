<template>
  <div class="masonry">
    <h1>My Guy</h1>
    <!-- <div v-for="product in products" :key="product.id" class="masonry-item">
      <img :src="product.image_url" @click="viewProduct(product.id)">
      <p>{{ product.name }}</p>
    </div> -->
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      products: []
    }
  },
//   created() {
//     axios.get('/api/products').then(response => {
//       this.products = response.data;
//     });
//   },
//   methods: {
//     viewProduct(id) {
//       this.$router.push(`/products/${id}`);
//     }
//   }
}
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
