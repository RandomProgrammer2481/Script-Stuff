
<template>
    <table>
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tr v-for="author in getAllAuthors" :key="author.id">
            <td>{{ author.name }}</td>
            <td><RouterLink :to="{ name: 'authors.edit', params: { id: author.id } }">Bewerk</RouterLink></td>
            <td><button @click="deleteauthor(author.id)">Verwijder</button></td>
        </tr>
    </table>
</template>

<script setup lang="ts">
    import { deleteauthor, fetchAuthors, getAllAuthors } from '../store';

    fetchAuthors();
</script>
