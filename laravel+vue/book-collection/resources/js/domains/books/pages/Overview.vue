<template>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Summary</th>
            </tr>
        </thead>
        <tr v-for="book in getAllBooks" :key="book.id">
            <td>{{ book.title }}</td>
            <td>{{ book.summary }}</td>
            <td><RouterLink :to="{ name: 'books.edit', params: { id: book.id } }">Bewerk</RouterLink></td>
            <td><button @click="deleteBook(book.id)">Verwijder</button></td>
        </tr>
    </table>
</template>

<script setup lang="ts">
    import { deleteBook, fetchBooks, getAllBooks } from '../store';

    fetchBooks();
</script>
