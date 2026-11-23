<template>
    <div>
        <h2>Maak een nieuwe reactie</h2>
        <Form :reaction="reaction" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { Ref, ref } from 'vue';
import { useRouter } from 'vue-router';
import {Reaction, reactionStore } from '../store.js';
import { User } from '../../users/store.js';
import Form from '../components/Form.vue';
import { Ticket } from '../../tickets/store.js';

const router = useRouter();

const reaction: Ref<Reaction> = ref({
    id: NaN,
    body: '',
    created_at : new Date,
    updated_at : new Date,
    user: {} as User,
    ticket: {} as Ticket
});

const handleSubmit = async (data: Reaction) => {
    await reactionStore.actions.create(data)
};

</script>