<template>
    <p>Create a Note</p>
    <Form :note="note" @submit="handleSubmit"></Form>
</template>


<script setup lang="ts">
import { ref, Ref } from 'vue';
import { Note, noteStore } from '../store';
import Form from './Form.vue';
import { Ticket } from '../../tickets/store';


const props = defineProps({ticketId: Number})
const ticket_id: Ref<number> = ref(Number(props.ticketId))

const note: Note = {} as Note

const handleSubmit = (data: Note) => {
    noteStore.actions.create(ticket_id.value, data)
}

</script>