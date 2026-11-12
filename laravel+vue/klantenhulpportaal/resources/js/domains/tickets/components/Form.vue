<template>
    <form @submit.prevent="handleSubmit">
        <label>Titel:</label>
        <br>
        <input v-model="form.title" type="text" required />
        <br>
        <label>Categories: </label>
        <br>
        <multiselect v-model="form.categories" mode="tags" :options="options"></multiselect>
        <br>

        <label>Beschrijf het probleem:</label>
        <br>
        <textarea v-model="form.body" required></textarea>
        <br>
        <button type="submit">Opslaan</button>
    </form>
</template>

<script setup lang="ts">
import { computed, onMounted, ref } from 'vue';
import { Category, categoryStore } from '../../categories/store';
import Multiselect from '@vueform/multiselect'


const props = defineProps({ ticket: Object });

const emit = defineEmits(['submit']);

const form = ref({ ...props.ticket,
    categories: (props.ticket?.categories).map((c: Category) => (c.id)),
});

const categories = categoryStore.getters.all
const options = computed(() => Object.values(categories.value).map(c => ({ value: c.id, label: c.title })))
const handleSubmit = () => emit('submit', form.value);


console.log('ticket categories:', props.ticket?.categories);
console.log('options:', options.value);
onMounted(() => {
    categoryStore.actions.fetchAll()
});
</script>