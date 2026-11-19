<template>
    <div v-if="ticket">
        <div>
            <h3 class="text-2xl font-semibold">{{ ticket.title }}</h3>
            <p>Aangemaakt door: {{ ticket.creator?.name }}</p>
            <p>Aangemaakt op: {{ ticket.created_at }}</p>
            <p>Laatste update op: {{ ticket.updated_at }}</p>
            <span class="flex flex-row gap-2">
                <p>Categorieën: </p>
                <p v-for="category in ticket.categories">{{category.title}}, </p>
            </span>
            <div v-if="isAdmin">
                <div>
                    <label>Status: </label>
                    <select v-model="selectedStatus" @change="handleStatusUpdate">
                        <option v-for="status in statuses" :key="status.id" :value="status">
                            {{ status.title }}
                        </option>
                    </select>
                </div>
                <div>
                    <p v-if="ticket.assignee">Deze ticket is toegewezen aan {{ ticket.assignee.name }}</p>
                    <form v-else @submit.prevent="handleAssigneeUpdate">
                        <label>Wijs dit ticket toe aan </label>
                        <select v-model="selectedAdmin">
                            <option :value="null" disabled>Select an admin</option>
                            <option v-for="admin in admins" :key="admin.id" :value="admin">{{ admin.name }} </option>
                        </select>
                        <button type="submit" >confirm</button>
                    </form>
                </div>
            </div>
            <p v-else> Status: {{ ticket.status?.title }}</p>
            <br>
            <p>{{ ticket.body }}</p>
        </div>
        <br>
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
import { useRoute } from 'vue-router'
import { ticketStore } from '../store'
import { onMounted, ref, watch } from 'vue'
import { reactionStore } from '../../reactions/store'
import { auth } from '../../auth/store'
import { User, userStore } from '../../users/store'
import { Status, statusStore } from '../../statuses/store'


const {isAdmin} = auth()
const route = useRoute()
const ticket_id = Number(route.params.id)

const ticket = ticketStore.getters.getById(ticket_id)
const reactions = reactionStore.getters.getByTicketId(ticket_id)
const admins = userStore.getters.getAdmins()
const statuses = statusStore.getters.all


const selectedAdmin = ref<User | null>(null)
const selectedStatus = ref<Status | null>(null)

const handleAssigneeUpdate = async () => {
    if (!selectedAdmin.value) return;
    await ticketStore.actions.assign(ticket_id, selectedAdmin.value);
    await ticketStore.actions.fetchAll(); // refresh the tickets
    
};

const handleStatusUpdate = async () => {
    if (!selectedStatus.value) return;
    await ticketStore.actions.updateStatus(ticket_id, selectedStatus.value);
    await ticketStore.actions.fetchAll(); // refresh the tickets
};

watch(
    () => ticket.value?.status,
    (status) => { selectedStatus.value = status ?? null },
    { immediate: true }
)

onMounted(() => {
    if (isAdmin.value === true) {
        userStore.actions.fetchAdmins()
        statusStore.actions.fetchAll()
    }
    ticketStore.actions.fetchAll()
    reactionStore.actions.fetchByTicketId(ticket_id)
});
</script>