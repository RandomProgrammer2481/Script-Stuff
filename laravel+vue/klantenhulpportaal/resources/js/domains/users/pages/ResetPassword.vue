<template>
    <div v-if="loading">
        <h1>Loading...</h1>
    </div>
    <div v-else>
        <form @submit.prevent="handleSubmit">
            <label>Enter New Password:</label>
            <br>
            <input v-model="request.password" type="password" required>
            <br>
            <label>Confirm Password:</label>
            <br>
            <input v-model="request.password_confirmation" type="password" required>
            <br>
            <button type="submit">Change password</button>
        </form>

        <div v-if="error">
        <h1>{{ error }}</h1>
    </div>
    </div>
</template>

<script setup lang="ts">
import { useRoute, useRouter } from 'vue-router';
import { postRequest } from '../../../services/http';
import { ref } from 'vue';

const route = useRoute()
const router = useRouter()

const error = ref('')

const request = ref({
    password: "",
    password_confirmation: "",
    token: String(route.params.token ?? ''),
    email: String(route.query.email ?? '')
});

const loading = ref(false)

const handleSubmit = async() => {
    loading.value = true;
    try {
        await postRequest('/reset-password', request.value);
        router.push({name: 'auth.login'})
    } catch(e:any) {
        error.value = e.message
    } finally {
        loading.value = false
    }
    
};
</script>