<template>
    <div class="sidebar">
        <ul>
            <li><router-link to="/">Dashboard</router-link></li>
            <li><router-link to="/posts">Posts</router-link></li>
            <li><router-link to="/users">Users</router-link></li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'Sidebar',
};
</script>

<style scoped>
.sidebar {
    width: 200px;
    background-color: #f8f9fa;
    padding: 20px;
    height: 100vh;
    position: fixed;
}
ul {
    list-style-type: none;
    padding: 0;
}
li {
    margin: 10px 0;
}
</style>
