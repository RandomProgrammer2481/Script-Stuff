<template>
    <form @submit.prevent="handleSubmit">
        <textarea cols="75" rows="4" v-model="note.body" type="text" required>{{ note.body }}</textarea>
        <br>
        <button type="submit">Opslaan</button>
    </form>
</template>

<script setup lang="ts">
import { Ref, ref } from 'vue';

const emit = defineEmits(["submit"])
const props = defineProps({note: Object})
const note: Ref = ref({...props.note})



const handleSubmit = () => {
    emit("submit", note.value)
}
</script>