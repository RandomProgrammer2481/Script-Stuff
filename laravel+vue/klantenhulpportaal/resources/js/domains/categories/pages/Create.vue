<template>
    <div>
        <h2>Maak een nieuwe categorie</h2>
        <Form :category="category" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { Ref, ref } from 'vue';
import { useRouter } from 'vue-router';
import {Category, categoryStore} from '../store.js';
import Form from '../components/Form.vue';


const router = useRouter();

const category: Ref<Category> = ref({
    id: NaN,
    title: '',
    created_at : new Date,
    updated_at : new Date,
});

const handleSubmit = async (data: Category) => {
    await categoryStore.actions.create(data)
    router.push({name: 'categories.index'})
};
</script>