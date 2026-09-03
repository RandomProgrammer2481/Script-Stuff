<script setup lang="ts">
import ItemForm from '../components/ItemForm.vue';
import {addItem, type Item} from '../store';
import {useRouter} from 'vue-router';

const router = useRouter();

const currentItem: Item = {id: 0, name: '', minimumAmount: 0, actualAmount: 0};

const handleEdit = (currentItem: Item) => {
    currentItem.id = Date.now();

    addItem(currentItem);
    router.push({name: 'inventory.overview'});
};
</script>

<template>
    Enter data below to add an item to the system.
    <ItemForm :item="currentItem" @submit="handleEdit"></ItemForm>
</template>
