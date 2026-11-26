<template>
    <div>
        <p>{{ note?.user.name }} Noteerde :</p>
        <Form v-if="editing" :note="note" @submit="handleSubmit"></Form>
        <div v-else>
            <p>{{ note?.body }}</p>
            <p><button @click="editing = true">Edit</button> | <button @click="handleDelete">Delete</button></p>
        </div>
    </div>
</template>


<script setup lang="ts">
import { ref } from 'vue';
import { Note, noteStore } from '../store';
import Form from './Form.vue';

const props = defineProps<{ note: Note }>();
const editing = ref(false);

const handleSubmit = async (data: Note) => {
    await noteStore.actions.update(props.note.id, data);
    editing.value = false;
}

const handleDelete = () => {
    noteStore.actions.delete(props.note.id)
}

</script>