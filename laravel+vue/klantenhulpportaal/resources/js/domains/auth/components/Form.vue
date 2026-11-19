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
        <RouterLink :to="{name: 'password.forgot'}">Forgot your password?</RouterLink>
        <br>
        <button type="submit">Inloggen.</button>
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

const props = defineProps({ credentials: Object });

const emit = defineEmits(['submit']);

const auth = ref({ ...props.credentials });

const handleSubmit = () => emit('submit', auth.value);
</script>