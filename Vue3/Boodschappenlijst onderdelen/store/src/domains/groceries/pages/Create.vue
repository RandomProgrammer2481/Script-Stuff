<script setup lang="ts">
import {ref, reactive, computed} from 'vue';
import GroceryForm from '../components/GroceryForm.vue';
import {addGrocery} from '../store.ts';

const grocery = {name: '', price: 0, amount: 0};

const handleGrocery = (newGrocery: {name: string; price: number; amount: number; id: number}) => {
    const current_time: number = Date.now();
    const id = current_time;
    newGrocery.id = id;
    addGrocery(newGrocery);
};
</script>

<template>
    <GroceryForm :grocery="grocery" @submit="handleGrocery"></GroceryForm>
</template>
