<template>
    <form @submit.prevent="handleSubmit">
        <input v-model="form.score" type="number" max="10" value="5" required> / 10
        <br>
        <input v-model="form.username" type="text" placeholder="Username goes here" required />
        <br>
        <textarea v-model="form.body" placeholder="Comment goes here" required></textarea>
        <br>
        <button type="submit">Opslaan</button>
    </form>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const props = defineProps({ review: Object });

const emit = defineEmits(['submit']);

const form = ref({ ...props.review });

const handleSubmit = () => emit('submit', form.value);
</script>