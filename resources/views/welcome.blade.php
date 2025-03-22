<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel with Vue Router</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <div style="display: flex;">
        <sidebar></sidebar>
        <div style="margin-left: 220px; padding: 20px; width: 100%;">
            <router-view></router-view>
        </div>
    </div>
</div>
</body>
</html>
