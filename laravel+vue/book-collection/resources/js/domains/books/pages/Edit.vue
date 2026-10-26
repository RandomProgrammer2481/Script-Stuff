<template>
    <div>
        <h2>Boek bewerken</h2>
        <Form v-if="book" :book="book" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { useRoute, useRouter } from 'vue-router';
import Form from '../components/Form.vue';
import { Book, bookStore } from '../store';

const route = useRoute();
const router = useRouter();

const books = bookStore.getters.all;

const book = bookStore.getters.getById(Number(route.params.id));

const handleSubmit = async (data: Book) => {
    await bookStore.actions.update(Number(route.params.id), data);
    router.push({ name: 'books.overview' });
};
</script>