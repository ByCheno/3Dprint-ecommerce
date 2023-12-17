import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';

const app = createApp({});

import LastProducts from './components/LastProducts.vue';
app.component('last-products', LastProducts);
app.mount('#app');
