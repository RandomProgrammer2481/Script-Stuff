<template>
    <table class="w-full border-collapse border border-gray-300 text-left text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2">Titel</th>
                <th class="border border-gray-300 px-4 py-2">Id</th>
                <th class="border border-gray-300 px-4 py-2">Acties</th>
            </tr>
        </thead>
        <tbody class="bg-gray-100">
            <tr v-for="category in categories" :key="category.id" class="hover:bg-gray-50">
                <td class="border border-gray-300 px-4 py-2">{{ category.title }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ category.id }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <RouterLink :to="{ name: 'categories.edit', params: { id: category.id } }">
                        Edit
                    </RouterLink> | 
                    <button @click="handleDelete(category.id)">Verwijderen</button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script setup lang="ts">
import { computed, onMounted } from 'vue';
import { categoryStore } from '../store';

const handleDelete = (category_id: number) => {
    categoryStore.actions.delete(category_id)
}

const categories = computed(() =>
    Object.values(categoryStore.getters.all.value)
        .sort((a,b) => a.title.localeCompare(b.title))
)

onMounted(() => {
    categoryStore.actions.fetchAll()
})
</script>