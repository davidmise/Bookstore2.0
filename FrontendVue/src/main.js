import './assets/main.css'
// icons libarary
import 'font-awesome/css/font-awesome.css';

// boostrap
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
// import 'node_modules/jquery/dist/jquery.js';


import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router';

import $ from "jquery"





const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use($)

app.mount('#app')
