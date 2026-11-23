<template>
    <form @submit.prevent="handleSubmit">
        <textarea v-model="form.body" required></textarea>
        <br>
        <button type="submit">Opslaan</button>
    </form>
</template>

<script setup lang="ts">
import { Ref, ref } from 'vue';



const props = defineProps({ reaction: Object });

const emit = defineEmits(['submit']);

const form: Ref = ref({ ...props.reaction});

const handleSubmit = () => emit('submit', form.value);
</script>