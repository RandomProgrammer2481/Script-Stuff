<script setup lang="ts"></script>

<template>
    <nav>
        <RouterLink to="/">Overview</RouterLink>
        <RouterLink to="/Order">Order</RouterLink>
        <RouterLink to="/Create">Add a new Item</RouterLink>
    </nav>
    <body>
        <routerView></routerView>
    </body>
</template>
