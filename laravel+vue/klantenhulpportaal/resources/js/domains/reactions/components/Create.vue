<template>
    <Form :reaction="reaction" @submit="handleSubmit"></Form>
</template>
<script setup lang="ts">
import { Ref, ref } from 'vue';
import { Category, categoryStore } from '../../categories/store.js';
import { Ticket } from '../../tickets/store.js';
import { User } from '../../users/store.js';
import { Reaction, reactionStore } from '../store.js';
import Form from './Form.vue';


const reaction: Ref<Reaction>= ref({
    id: NaN,
    body: "",
    user: {} as User,
    created_at: new Date,
    updated_at: new Date,
    ticket: {} as Ticket,
})

const handleSubmit = async (data: Reaction) => {
    await reactionStore.actions.create(data)

}
</script>