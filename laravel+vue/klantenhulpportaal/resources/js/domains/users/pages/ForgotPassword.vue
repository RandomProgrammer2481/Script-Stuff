<template>
    <div v-if="loading">
        <h1>Loading...</h1>
    </div>
    <div v-else-if="error">
        <h1>{{ error }}</h1>
    </div>
    <div v-else-if="submitted_request">
        <h1>If we found an account with your email you will be sent a reset link shortly</h1>
    </div>
    <div v-else>
        <form @submit.prevent="handleSubmit">
            <label>Enter Email:</label>
            <br>
            <input v-model="email" type="email" required>
            <br>
            <button type="submit">Send Password Reset Link</button>
        </form>
    </div>
</template>

<script setup lang="ts">
import { postRequest } from '../../../services/http';
import { ref } from 'vue';

const email = ref('')
const error = ref('')
const submitted_request = ref(false);
const loading = ref(false)

const handleSubmit = async() => {
    loading.value = true;
     try {
        await postRequest('/forgot-password', {email: email.value});
        
    } catch(e:any) {
        error.value = e.message
    } finally {
        loading.value = false
    }

    submitted_request.value = true;
};

</script>