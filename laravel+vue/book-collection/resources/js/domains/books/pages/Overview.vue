<script setup lang="ts">
    import { onMounted } from 'vue';
    import { fetchBooks, getAllBooks } from '../store';

    fetchBooks();
</script>

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
        </tr>
    </table>
</template>