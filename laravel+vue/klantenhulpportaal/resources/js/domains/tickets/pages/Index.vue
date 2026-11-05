<template>
    <div>
        <div v-for="ticket in tickets" :key="ticket.id">
            <h1>{{ ticket.title }}</h1>
        </div>
    </div>
</template>
<script setup lang="ts">
import { onMounted } from 'vue';
import { ticketStore } from '../store';
const tickets = ticketStore.getters.all;

onMounted(() => {
    ticketStore.actions.getAll()
});
</script>