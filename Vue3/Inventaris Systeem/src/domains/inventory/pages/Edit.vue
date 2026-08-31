<script setup lang="ts">
import {ref, reactive, computed} from 'vue';
import ItemForm from '../components/ItemForm.vue';
import {getItemById, updateItem, type item} from '../store';
import {useRoute, useRouter} from 'vue-router';

const route = useRoute();

const router = useRouter();

const itemId = route.params.ID;

let currentItem = getItemById(Number(itemId));

const handleEdit = (currentItem: item) => {
    updateItem(currentItem);
    router.push('/');
};
</script>

<template>
    Edit the data below to add new item
    <ItemForm :item="currentItem" @submit="handleEdit"></ItemForm>
</template>
