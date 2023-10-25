import { createRouter, createWebHistory } from 'vue-router'
// import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue'
import RegisterForm from '../views/RegisterView.vue'
import SignInForm from '../views/SIngInView.vue'
import Books from '../views/BooksView.vue'
import  AuthorProfileComponent from '../views/AuthorProfile.vue'
import ReaderProfileComponent from '../views/ReaderProfile.vue'
import publishBooks from '../views/AuthorsView.vue'
import CartPage from '../views/CartView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },

    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },

    {
      path: '/register',
      name: 'RegisterForm',
      component: RegisterForm,
    },

    {
      path: '/login',
      name: 'login',
      component: SignInForm,
    },

    {
      path: '/books',
      name: 'books',
      component: Books,
      meta: { requiresAuth: true }, // This route requires authentication
    },

    {
      path: '/publish',
      name: 'publishBooks',
      component: publishBooks,
      meta: { requiresAuth: true }, // This route requires authentication
    },

    {
      path: '/author-profile',
      name: 'author.profile',
      component: AuthorProfileComponent, // Replace with your actual component
      meta: { requiresAuth: true }, // Requires authentication
  },

  {
      path: '/reader-profile',
      name: 'reader.profile',
      component: ReaderProfileComponent, // Replace with your actual component
      meta: { requiresAuth: true }, // Requires authentication
  },

  {
    path: '/cart',
    name: 'cart',
    component: CartPage, // Replace with your actual component
    meta: { requiresAuth: true }, // Requires authentication
},


  ]
})

router.beforeEach((to, from, next) => {
  // Check if the user is logged in (based on your logic)
  const isAuthenticated = !!localStorage.getItem('user_id');

  if (to.meta.requiresAuth) {
    // This route requires authentication
    if (!isAuthenticated) {
      // User is not logged in, redirect to login
      next({ name: 'login' });
    } else {
      // User is logged in, allow navigation
      next();
    }
  } else if ((to.name === 'login' || to.name === 'RegisterForm') && isAuthenticated) {
    // If user is logged in and tries to access login or register page, redirect to home
    next({ name: 'home' });
  } else {
    // For other routes, simply allow the navigation
    next();
  }
  
});

export default router
