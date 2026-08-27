<script setup lang="ts">
import {ref, reactive, computed} from 'vue';

defineProps({
    message: String,
});

const emit = defineEmits(['updateMessage']);

const onClick = () => {
    emit('updateMessage');
};
</script>

<template>
    <h3>{{ message }}</h3>

    <button @click="onClick">Change Above Text</button>
</template>
