<script setup lang="ts">
import {ref, reactive, computed} from 'vue';
import ItemForm from '../components/ItemForm.vue';
import {addItem, getItemById, updateItem, type Item} from '../store';
import {useRoute, useRouter} from 'vue-router';

const route = useRoute();

const router = useRouter();

const itemId = route.params.ID;

const currentItem: Item = {id: 0, name: '', minimumAmount: 0, actualAmount: 0};

const handleEdit = (currentItem: Item) => {
    currentItem.id = Date.now();

    addItem(currentItem);
    router.push('/');
};
</script>

<template>
    Enter data below to add an item to the system.
    <ItemForm :item="currentItem" @submit="handleEdit"></ItemForm>
</template>
