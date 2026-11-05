<template>
    <table class="w-full border-collapse border border-gray-300 text-left text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Titel</th>
                <th class="border border-gray-300 px-4 py-2">Categorieën</th>
                <th class="border border-gray-300 px-4 py-2">Status</th>
                <th class="border border-gray-300 px-4 py-2">Aangemaakt door</th>
                <th class="border border-gray-300 px-4 py-2">Aangemaakt op</th>
                <th class="border border-gray-300 px-4 py-2">Laatste update op</th>
                <th class="border border-gray-300 px-4 py-2">Toegewezen aan</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="ticket in tickets" :key="ticket.id" class="hover:bg-gray-50">
                <td class="border border-gray-300 px-4 py-2">{{ ticket.id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ ticket.title }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <p v-for="category in ticket.categories" :key="category.id">{{ category.title }}</p>
                </td>
                <td class="border border-gray-300 px-4 py-2">{{ ticket.status.title }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ ticket.creator.name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ ticket.created_at }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ ticket.updated_at }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ ticket.assignee.name }}</td>
            </tr>
        </tbody>
    </table>
</template>
<script setup lang="ts">
import { onMounted } from 'vue';
import { ticketStore } from '../store';
const tickets = ticketStore.getters.all;

onMounted(() => {
    ticketStore.actions.fetchAll()
});
</script>