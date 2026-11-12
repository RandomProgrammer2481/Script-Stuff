<template>
    <div>
        <h2>Pas de ticket aan</h2>
        <Form v-if="ticket" :ticket="ticket" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { computed, ComputedRef, onMounted} from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { Ticket, ticketStore } from '../store.js';
import Form from '../components/Form.vue';

const router = useRouter();
const route = useRoute();

const ticket_id = Number(route.params.id)

const ticket:ComputedRef<Ticket> = ticketStore.getters.getById(ticket_id)

const handleSubmit = async (data: Ticket) => {
    await ticketStore.actions.update(ticket_id, data)
    router.push({name: "tickets.index"})
};

onMounted(() => {
    ticketStore.actions.fetchAll()
});
</script>