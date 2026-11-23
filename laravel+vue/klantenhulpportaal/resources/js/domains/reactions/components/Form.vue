<template>
    <form @submit.prevent="handleSubmit">
        
        <label></label>
        <br>
        <textarea v-model="form.body" required>{{ form.body }}</textarea>
        <br>
        <button type="submit">Post.</button>
        <br>
        <br>
        <div class="text-red-900 font-bold" v-if="getMessage">
            {{ getMessage }}
        </div>
    </form>
</template>
<script setup lang="ts">
import { ref } from 'vue';
import { getMessage } from '../../../services/error';

const props = defineProps({ reaction: Object });

const emit = defineEmits(['submit']);

const form = ref({ ...props.reaction });

const handleSubmit = () => emit('submit', form.value);
</script>