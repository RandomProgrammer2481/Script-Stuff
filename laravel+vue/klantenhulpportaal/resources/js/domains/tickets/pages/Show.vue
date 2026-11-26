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
                    <select v-model="selectedStatusId" @change="handleStatusUpdate">
                        <option v-for="status in statuses" :key="status.id" :value="status.id">
                            {{ status.title }}
                        </option>
                    </select>
                </div>
                <div>
                    <p v-if="ticket.assignee">Deze ticket is toegewezen aan {{ ticket.assignee.name }}</p>
                    <form v-else @submit.prevent="handleAssigneeUpdate">
                        <label>Wijs dit ticket toe aan </label>
                        <select v-model="selectedAdminId">
                            <option :value="null" disabled>Select an admin</option>
                            <option v-for="admin in admins" :key="admin.id" :value="admin.id">{{ admin.name }} </option>
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
        <Create v-if="isAdmin"></Create>
        <br>
        <div v-if="reactions">
            <div v-for="reaction in reactions">
                <Edit :reaction="reaction" v-if="editingReactionId === reaction.id" @submitted="editingReactionId = null"></Edit>
                <ReactionCard :reaction="reaction" @edit="editingReactionId = reaction.id"></ReactionCard>
            </div>
        </div>
        <br>
        <div v-if="isAdmin">
            <p class="font-semibold">Notes</p>
            <NoteCreate :ticket-id="ticket_id"></NoteCreate>
            <br>
            <NoteIndex :ticket-id="ticket_id"></NoteIndex>
        </div>
    </div>
</template>
<script setup lang="ts">
import { useRoute } from 'vue-router'
import { ticketStore } from '../store'
import { onMounted, ref, watch } from 'vue'
import { reactionStore } from '../../reactions/store'
import { auth } from '../../auth/store'
import { userStore } from '../../users/store'
import { statusStore } from '../../statuses/store'
import Create from '../../reactions/components/Create.vue'
import Edit from '../../reactions/components/Edit.vue'
import ReactionCard from '../../reactions/components/ReactionCard.vue'
import NoteIndex from '../../notes/components/NoteIndex.vue'
import NoteCreate from '../../notes/components/NoteCreate.vue'


const {isAdmin} = auth()
const route = useRoute()
const ticket_id = Number(route.params.id)

const ticket = ticketStore.getters.getById(ticket_id)
const reactions = reactionStore.getters.all
const admins = userStore.getters.getAdmins()
const statuses = statusStore.getters.all


const selectedAdminId = ref<number | null>(null)
const selectedStatusId = ref<number | null>(null)
const editingReactionId = ref<number | null>(null)

const handleAssigneeUpdate = async () => {
    if (selectedAdminId.value === null) return;
    await ticketStore.actions.assign(ticket_id, selectedAdminId.value);
    await ticketStore.actions.fetchAll(); 
    
};

const handleStatusUpdate = async () => {
    if (selectedStatusId.value === null) return;
    await ticketStore.actions.updateStatus(ticket_id, selectedStatusId.value);
    await ticketStore.actions.fetchAll(); 
};

watch(
    () => ticket.value?.status?.id,
    (id) => { selectedStatusId.value = id ?? null },
    { immediate: true }
)

onMounted( async () => {
    if (isAdmin.value === true) {
        await userStore.actions.fetchAdmins()
        await statusStore.actions.fetchAll()
    }
    await ticketStore.actions.fetchAll()
    await reactionStore.actions.fetchByTicketId(ticket_id)
});
</script>