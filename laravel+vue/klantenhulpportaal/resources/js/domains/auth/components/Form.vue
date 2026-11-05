<template>
    <form @submit.prevent="handleSubmit">
        <label>Email</label>
        <br>
        <input v-model="auth.email" type="email" required>
        <br>
        <label>Wachtwoord</label>
        <br>
        <input v-model="auth.password" type="password" required>
        <br>
        <button type="submit">Inloggen.</button>
    </form>
</template>
<script setup lang="ts">
import { ref } from 'vue';

const props = defineProps({ auth: Object });

const emit = defineEmits(['submit']);

const auth = ref({ ...props.auth });

const handleSubmit = () => emit('submit', auth.value);
</script>