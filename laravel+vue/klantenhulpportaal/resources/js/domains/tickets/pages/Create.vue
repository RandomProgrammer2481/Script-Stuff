<template>
    <div>
        <h2>Maak een nieuwe Ticket</h2>
        <Form :ticket="ticket" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { Ref, ref } from 'vue';
import { useRouter } from 'vue-router';
import { Status, Ticket, ticketStore } from '../store.js';
import { User } from '../../users/store.js';
import Form from '../components/Form.vue';

const router = useRouter();

const ticket: Ref<Ticket> = ref({
    id: NaN,
    title: '',
    body: '',
    categories: [],
    created_at : new Date,
    updated_at : new Date,
    status : {} as Status,
    creator: {} as User,
    assignee: {} as User
});

const handleSubmit = async (data: Ticket) => {
    await ticketStore.actions.create(data)
    router.push({name: "tickets.index"})
};

</script>