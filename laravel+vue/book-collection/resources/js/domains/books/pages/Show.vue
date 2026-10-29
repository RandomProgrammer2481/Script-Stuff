<template>
    <div v-if="book">
        <h2>{{ book.title }}</h2>
        <h6 v-if="author">by {{ author.name }}</h6>
        <p>{{ book.summary }}</p>
    </div>
    <br>
    <div>
        <Create :book-id="bookId"></Create>
    </div>
    <br>
    <div>
        <Overview :book-id="bookId"></Overview>
    </div>
</template>

<script setup lang="ts">
    import { useRoute } from 'vue-router';
    import { bookStore} from '../store';
    import { authorStore } from '../../authors/store';
    import { computed, onMounted } from 'vue';
    import Create from '../../reviews/components/Create.vue';
import Overview from '../../reviews/pages/Overview.vue';

    const route = useRoute();
    const bookId = computed(() => Number(route.params.id));

    const book = bookStore.getters.getById(bookId.value);

    const author = computed(() =>
        authorStore.getters.getById(book.value.author_id).value
    );

    onMounted(() => {
        bookStore.actions.getAll();
        authorStore.actions.getAll();
    });
</script>