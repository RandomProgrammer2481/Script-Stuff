<template>
    <div>
        <Form :reaction="reaction" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { Ref, ref } from 'vue';
import {reactionStore } from '../store.js';
import Form from '../components/Form.vue';
import { useRoute } from 'vue-router';

const route = useRoute()

const props = defineProps({reaction: Object})

const emit = defineEmits<{ (e: 'submitted'): void }>()

const reaction: Ref = ref({...props.reaction})

const handleSubmit = async (data: any) => {
    data.ticket_id = Number(route.params.id)
    await reactionStore.actions.update(reaction.value.id, data)
    emit("submitted")
};

</script>