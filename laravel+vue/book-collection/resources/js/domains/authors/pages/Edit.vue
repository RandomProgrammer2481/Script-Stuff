<template>
    <div>
        <h2>Auteur bewerken</h2>
        <Form v-if="author" :author="author" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { useRoute, useRouter } from 'vue-router';
import Form from '../components/Form.vue';
import { Author, authorStore, } from '../store.js';

const route = useRoute();
const router = useRouter();

const authors = authorStore.getters.all;

const author = authorStore.getters.getById(Number(route.params.id));

const handleSubmit = async (data: Author) => {
    await authorStore.actions.update(Number(route.params.id), data);
    router.push({ name: 'authors.overview' });
};
</script>