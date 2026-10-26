<template>
    <div>
        <h2>Nieuwe Auteur toevoegen</h2>
        <Form :author="author" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import Form from '../components/Form.vue';
import { useRouter } from 'vue-router';
import { Author, authorStore } from '../store.js';

const router = useRouter();

const author = ref({
    name: '',
});

const handleSubmit = async (data: Author) => {
    await authorStore.actions.create(data);
    router.push({name: 'authors.overview'});
};
</script>