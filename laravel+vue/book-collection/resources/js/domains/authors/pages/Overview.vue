
<template>
    <table>
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tr v-for="author in authors" :key="author.id">
            <td>{{ author.name }}</td>
            <td><RouterLink :to="{ name: 'authors.edit', params: { id: author.id } }">Bewerk</RouterLink></td>
            <td><button @click="authorStore.actions.delete(author.id)">Verwijder</button></td>
        </tr>
    </table>
</template>

<script setup lang="ts">
    import { authorStore } from '../store';
    authorStore.actions.getAll();

    const authors = authorStore.getters.all;
</script>
