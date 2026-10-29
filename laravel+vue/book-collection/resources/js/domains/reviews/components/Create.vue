<template>
    <div>
        <h2>Nieuw Review toevoegen</h2>
        <Form :review="review" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
    import { ref } from 'vue';
    import { useRouter } from 'vue-router';
    import Form from './Form.vue';
    import { Review, reviewStore } from '../store.js';

    const router = useRouter();

    const props = defineProps({ bookId: Number })

    const review = ref({
        score: 0,
        username: '',
        body: ''
    });

    const handleSubmit = async (data: Review) => {
        await reviewStore(Number(props.bookId)).actions.create(data);
    };
</script>