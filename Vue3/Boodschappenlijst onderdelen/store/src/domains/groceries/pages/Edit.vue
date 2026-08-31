<script setup lang="ts">
import {ref, reactive, computed} from 'vue';

import GroceryForm from '../components/GroceryForm.vue';
import {useRoute} from 'vue-router';
import {getGroceryById, updateGrocery} from '../store.ts';

const route = useRoute();

const groceryId = route.params.ID;

let grocery = getGroceryById(Number(groceryId));

const handleGrocery = (newGrocery: {name: string; price: number; amount: number; id: number}) => {
    updateGrocery(newGrocery);
};
</script>

<template>
    <GroceryForm :grocery="grocery" @submit="handleGrocery"></GroceryForm>
</template>
