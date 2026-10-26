<template>
    <div>
        <h2>Auteur bewerken</h2>
        <Form v-if="author" :author="author" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { useRoute, useRouter } from 'vue-router';
import Form from '../components/Form.vue';
import { Author, fetchAuthors, getauthorById, updateauthor } from '../store.js';

const route = useRoute();
const router = useRouter();

fetchAuthors();

const author = getauthorById(Number(route.params.id));

const handleSubmit = async (data: Author) => {
    await updateauthor(Number(route.params.id), data);
    router.push({ name: 'authors.overview' });
};
</script>