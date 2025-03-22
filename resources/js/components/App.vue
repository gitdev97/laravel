<template>
   <div id="app">
       <Sidebar />
       <RouterView>

       </RouterView>
   </div>
</template>

<script>
import Sidebar from "./Sidebar.vue";

export default {
    name: 'App',
    components: {Sidebar},
};
</script>
