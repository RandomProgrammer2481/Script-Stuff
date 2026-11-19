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
        <br>
        <div v-if="isAdmin">
            <p v-if="ticket.assignee">Deze ticket is toegewezen aan {{ ticket.assignee.name }}</p>
            <form v-else @submit.prevent="handleSubmit">
                <label>Wijs dit ticket toe aan </label>
                <select v-model="selectedAdmin">
                    <option :value="null" disabled>Select an admin</option>
                    <option v-for="admin in admins" :key="admin.id" :value="admin">{{ admin.name }} </option>
                </select>
                <button type="submit" >confirm</button>
            </form>
        </div>
        <br>
        <div v-if="reactions">
            <div v-for="reaction in reactions">
                <p>{{ reaction.user?.name}} heeft gereageerd op {{ reaction.created_at }}</p>
                <p>{{ reaction.body }}</p>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import { useRoute } from 'vue-router';
import { ticketStore } from '../store';
import { onMounted, ref } from 'vue';
import { reactionStore } from '../../reactions/store';
import { auth } from '../../auth/store';
import { User, userStore } from '../../users/store';


const {isAdmin} = auth()
const route = useRoute()
const ticket_id = Number(route.params.id)

const ticket = ticketStore.getters.getById(ticket_id)
const reactions = reactionStore.getters.getByTicketId(ticket_id)
const admins = userStore.getters.getAdmins()

const selectedAdmin = ref<User | null>(null);

const handleSubmit = async () => {
    if (!selectedAdmin.value) return;
    await ticketStore.actions.assign(ticket_id, selectedAdmin.value);
};

onMounted(() => {
    auth().fetchUser()
    userStore.actions.fetchAdmins()
    ticketStore.actions.fetchAll()
    reactionStore.actions.fetchByTicketId(ticket_id)
});
</script>