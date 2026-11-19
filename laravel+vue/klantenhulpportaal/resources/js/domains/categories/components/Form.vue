<template>
    <form @submit.prevent="handleSubmit">
        <label>Titel:</label>
        <input v-model="form.title" type="text" required /> 
        <button type="submit">Opslaan</button>
    </form>
</template>

<script setup lang="ts">
import { Ref, ref } from 'vue';

const props = defineProps({ category: Object });

const emit = defineEmits(['submit']);

const form: Ref = ref({ ...props.category});

const handleSubmit = () => emit('submit', form.value);

</script>