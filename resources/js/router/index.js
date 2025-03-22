import { createRouter, createWebHistory } from 'vue-router';

// Import the components for your screens
import Dashboard from '../components/Dashboard.vue';
import Posts from '../components/Posts.vue';
import Users from '../components/Users.vue';

// Define routes
const routes = [
    { path: '/', name: 'Dashboard', component: Dashboard },
    { path: '/posts', name: 'Posts', component: Posts },
    { path: '/users', name: 'Users', component: Users },
];

// Create and export the router
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
