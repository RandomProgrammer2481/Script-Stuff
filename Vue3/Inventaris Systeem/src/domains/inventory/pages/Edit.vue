<script setup lang="ts">
import {ref, reactive, computed} from 'vue';
import ItemForm from '../components/ItemForm.vue';
import {getItemById, updateItem, type Item} from '../store';
import {useRoute, useRouter} from 'vue-router';

const route = useRoute();

const router = useRouter();

const itemId = route.params.ID;

const found = getItemById(Number(itemId)).value;
if (!found) {
    throw new Error(`Item with id ${itemId} not found`);
}
const currentItem: Item = found;

const handleEdit = (currentItem: Item) => {
    updateItem(currentItem);
    router.push('/');
};
</script>

<template>
    Make changes to the data below to edit the item.
    <ItemForm :item="currentItem" @submit="handleEdit"></ItemForm>
</template>
