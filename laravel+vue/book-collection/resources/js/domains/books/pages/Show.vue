<template>
    <div v-if="book">
        <h2>{{ book.title }}</h2>
        <h6 v-if="author">by {{ author.name }}</h6>
        <p>{{ book.summary }}</p>
    </div>
    <br>
    <div>
        <Create :bookId="bookId"></Create>
    </div>
    <br>
    <div>
        <ReviewOverview :book-id="bookId"></ReviewOverview>
    </div>
</template>

<script setup lang="ts">
    import { useRoute } from 'vue-router';
    import { bookStore} from '../store';
    import { authorStore } from '../../authors/store';
    import { computed, onMounted } from 'vue';
    import Create from '../../reviews/components/Create.vue';
    import ReviewOverview from '../../reviews/components/Review-Overview.vue';

    const route = useRoute();
    const bookId = computed(() => Number(route.params.id));

    const book = bookStore.getters.getById(bookId.value);

    const author = computed(() =>
        authorStore.getters.getById(book.value.author_id).value
    );

    onMounted(() => {
        bookStore.actions.fetchAll();
        authorStore.actions.fetchAll();
    });
</script>