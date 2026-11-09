<template>
    <div>
        <h2>Maak een nieuwe Ticket</h2>
        <Form :ticket="ticket" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { Ref, ref } from 'vue';
import { useRouter } from 'vue-router';
import Form from '../components/Form.vue';
import { Ticket, ticketStore } from '../store.js';

const router = useRouter();

const ticket: Ref<Ticket> = ref({
    id: NaN,
    title: '',
    body: '',
    categories: [],
});

const handleSubmit = async () => {
    
};

</script>