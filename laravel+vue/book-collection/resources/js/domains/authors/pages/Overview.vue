
<template>
    <table>
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tr v-for="author in getAllAuthors" :key="author.id">
            <td>{{ author.name }}</td>
        </tr>
    </table>
</template>

<script setup lang="ts">
    import { fetchAuthors, getAllAuthors } from '../store';

    fetchAuthors();
</script>
