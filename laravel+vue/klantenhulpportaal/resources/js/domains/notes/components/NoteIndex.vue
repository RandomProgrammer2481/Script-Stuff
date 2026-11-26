<template>
    <div v-for="note in sortedNotes">
        <NoteCard :note="note" :key="note.id"></NoteCard>
        <br>
    </div>
</template>


<script setup lang="ts">
import { computed, onMounted, ref, Ref } from 'vue';
import { noteStore } from '../store';
import NoteCard from './NoteCard.vue';
const notes = noteStore.getters.all
const sortedNotes = computed(() =>
    Object.values(notes.value).sort((a, b) => b.id - a.id)
);

const props = defineProps({ticketId: Number})
const ticket_id: Ref<number> = ref(Number(props.ticketId))

onMounted(() => {
    noteStore.actions.fetchByTicketId(ticket_id.value)
})
</script>