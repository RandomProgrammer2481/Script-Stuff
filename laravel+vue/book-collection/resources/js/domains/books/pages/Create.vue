<template>
    <div>
        <h2>Nieuw boek toevoegen</h2>
        <Form :book="book" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import Form from '../components/Form.vue';
import { Book, bookStore } from '../store';
import { useRouter } from 'vue-router';

const router = useRouter();

const book = ref({
    title: '',
    summary: '',
    author_id: null
});

const handleSubmit = async (data: Book) => {
    await bookStore.actions.create(data);
    router.push({name: 'books.overview'});
};
</script>