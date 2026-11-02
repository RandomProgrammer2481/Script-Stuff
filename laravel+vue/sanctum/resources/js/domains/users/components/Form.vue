<template>
    <form @submit.prevent="handleSubmit">
        <label>Email:</label>
        <br>
        <input v-model="user.email" type="email" required>
        <br>
        <label>Password:</label>
        <br>
        <input v-model="user.password" type="password" required>
        <br>
        <button type="submit">Log in</button>
    </form>
</template>

<script setup lang="ts">
import { ref } from 'vue';



const props = defineProps({ user: Object });

const emit = defineEmits(['submit']);

const user = ref({ ...props.user });

const handleSubmit = () => emit('submit', user.value);

</script>