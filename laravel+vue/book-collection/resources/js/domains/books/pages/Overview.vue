<template>
    <div>
        <div v-for="book in books" :key="book.id">
            <RouterLink :to="{ name: 'books.show', params: { id: book.id } }">
                <h4>{{ book.title }}</h4>
                <p>{{ book.summary}}</p>
            </RouterLink>
            <div>
                <RouterLink :to="{ name: 'books.edit', params: { id: book.id } }">Bewerk</RouterLink> | 
                <button @click="bookStore.actions.delete(book.id)">Verwijder</button>
            </div>
            <br>
        </div>
    </div>
</template>

<script setup lang="ts">
    import { onMounted } from 'vue';
    import { bookStore } from '../store';

    const books = bookStore.getters.all;

    onMounted(() => {
        bookStore.actions.getAll()
    });
</script>
