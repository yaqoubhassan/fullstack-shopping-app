import { createRouter, createWebHistory } from 'vue-router';
import ProductsList from '../views/ProductsList.vue';
// import ProductDetails from '../views/ProductDetails.vue';
// import InvoicesList from '../views/InvoicesList.vue';
// import InvoiceDetails from '../views/InvoiceDetails.vue';

const routes = [
  { path: '/', component: ProductsList },
  // { path: '/products/:id', component: ProductDetails },
  // { path: '/invoices', component: InvoicesList },
  // { path: '/invoices/:id', component: InvoiceDetails },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
