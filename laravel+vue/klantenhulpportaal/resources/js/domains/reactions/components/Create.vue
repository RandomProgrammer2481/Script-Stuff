<template>
    <div>
        <h2>Maak een nieuwe reactie</h2>
        <Form :reaction="reaction" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { Ref, ref } from 'vue';
import {Reaction, reactionStore } from '../store.js';
import Form from '../components/Form.vue';
import { useRoute } from 'vue-router';

const route = useRoute()

const reaction: Ref = ref({
    id: NaN,
    body: '',
    created_at : new Date,
    updated_at : new Date,
    user: NaN,
    ticket_id: NaN,
});

const handleSubmit = async (data: Reaction) => {
    await reactionStore.actions.create(Number(route.params.id), data)
};

</script>