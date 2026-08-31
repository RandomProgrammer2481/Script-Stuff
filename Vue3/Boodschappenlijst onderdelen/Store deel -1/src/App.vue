<script setup lang="ts">
import {ref, reactive, computed} from 'vue';
import GroceriesTable from './components/GroceriesTable.vue';
import {RouterLink} from 'vue-router';

let groceries = ref([
    {product: 'apples', price: 0.48, amount: 3},
    {product: 'ibuprofen', price: 1.99, amount: 2},
    {product: 'toilet paper', price: 4.99, amount: 1},
    {product: 'milk', price: 1.29, amount: 2},
    {product: 'bananas', price: 0.29, amount: 5},
]);
</script>

<template>
    <RouterLink to="/">Go to Overview</RouterLink>
    <RouterLink to="/create">Create Something</RouterLink>

    <routerView></routerView>
</template>
