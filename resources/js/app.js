import { createApp } from 'vue';
import router from './router'; // Import the router
import Sidebar from './components/Sidebar.vue'; // Import the Sidebar component
import App from './components/App.vue'; // Import the Sidebar component

// Create the Vue application
const app = createApp({
    components: { Sidebar, App },
});

// Use the router
app.use(router).mount('#app');
