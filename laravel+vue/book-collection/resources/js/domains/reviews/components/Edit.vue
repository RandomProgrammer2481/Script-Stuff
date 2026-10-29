<template>
    <div>
        <Form :review="review" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
    import { ref } from 'vue';
    import Form from './Form.vue';
    import { Review, reviewStore } from '../store.js';

    const props = defineProps({ bookId: Number, review: Object })
    const emit = defineEmits<{ (e: 'submitted'): void }>();

    const review = ref({...props.review})

    const handleSubmit = async (data: Review) => {
        await reviewStore(Number(props.bookId)).actions.update(Number(review.value.id), data);
        emit('submitted');
    };
</script>