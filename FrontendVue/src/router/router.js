// // Import Vue Router and your store (Vuex)

// import Vue from 'vue';
// import VueRouter from 'vue-router';
// // import Books from '../views/BooksView.vue'
// Vue.use(VueRouter);

// const router = new VueRouter({
    
//     // path: '/books',
//     // name: 'books',
//     // component: Books,
//     // meta: { requiresAuth: true }, // This route requires authentication
//     // Define your Vue Router configuration here
// },);

// // In your Vue Router configuration
// router.beforeEach((to, from, next) => {
//     const isAuthenticated = !!localStorage.getItem('user_id'); // Check if user_id is present
//     if (to.meta.requiresAuth && !isAuthenticated) {
//         next({ name: 'login' }); // Redirect to login if authentication is required
//     } else {
//         next(); // Proceed to the route
//     }
// });

// meta: { requiresAuth: true }, // This route requires authentication


import Vue from 'vue';
import VueRouter from 'vue-router';
// import store from './store'; // Import your Vuex store

Vue.use(VueRouter);

const router = new VueRouter({
    // Define your Vue Router configuration here
});

router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem('user_id'); // Check if user_id is present
    if (to.meta.requiresAuth && !isAuthenticated) {
        next({ name: 'login' }); // Redirect to login if authentication is required
    } else {
        next(); // Proceed to the route
    }
});

export default router;
