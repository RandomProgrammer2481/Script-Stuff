<template>
    <div v-if="ticket">
        <div>
            <h3>{{ ticket.title }}</h3>
            <p>Aangemaakt door: {{ ticket.creator?.name }}</p>
            <p>Aangemaakt op: {{ ticket.created_at }}</p>
            <p>Laatste update op: {{ ticket.updated_at }}</p>
            <p>Categorieën: </p>
            <div v-for="category in ticket.categories">
                <p>{{category.title}}</p>
            </div>
            <p>Status: {{ ticket.status?.title }}</p>
            <p>{{ ticket.body }}</p>
        </div>
        <div>
            <div v-for="reaction in reactions">
                <h6>{{ reaction.user?.name}}</h6>
                <p>heeft gereageerd op: {{ reaction.created_at }}</p>
                <p>{{ reaction.body }}</p>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import { useRoute } from 'vue-router';
import { ticketStore } from '../store';
import { onMounted } from 'vue';
import { reactionStore } from '../../reactions/store';
const route = useRoute()
const ticket = ticketStore.getters.getById(Number(route.params.id))

const reactions = reactionStore.getters.all

onMounted(() => {
    ticketStore.actions.fetchAll()
    reactionStore.actions.fetchAll()
});
</script>