<template>
    <div v-if="book">
        <h2>{{ book.title }}</h2>
        <!--<h6>by {{ author.name }}</h6> -->
        <p>{{ book.summary }}</p>
    </div>

</template>

<script setup lang="ts">
    import { useRoute } from 'vue-router';
    import { bookStore } from '../store';
    import { authorStore } from '../../authors/store';
    bookStore.actions.getAll()

    const route = useRoute();
    const book =  bookStore.getters.getById(Number(route.params.id));
    //let author = authorStore.getters.getById(book.value.author_id);
    // FIX THIS ^
</script>