<template>
    <div>
        <h2>Pas de categorie aan</h2>
        <Form :category="category" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { ComputedRef, onMounted, } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import {Category, categoryStore} from '../store.js';
import Form from '../components/Form.vue';

const router = useRouter();
const route = useRoute();

const category_id = Number(route.params.id)

const category:ComputedRef<Category> = categoryStore.getters.getById(category_id)

const handleSubmit = async (data: Category) => {
    await categoryStore.actions.update(category_id, data)
    router.push({name: 'categories.index'})
};

onMounted( () => {
    categoryStore.actions.fetchAll()
});
</script>