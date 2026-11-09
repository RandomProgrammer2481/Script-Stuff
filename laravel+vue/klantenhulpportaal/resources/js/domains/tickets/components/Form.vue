<template>
    <ticket @submit.prevent="handleSubmit">
        <label>Titel:</label>
        <input v-model="ticket.title" type="text" required />

        <label>Beschrijf het probleem:</label>
        <textarea v-model="ticket.body" required></textarea>

        <button type="submit">Opslaan</button>
    </ticket>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const props = defineProps({ ticket: Object });

const emit = defineEmits(['submit']);

const ticket = ref({ ...props.ticket });

const handleSubmit = () => emit('submit', ticket.value);
</script>