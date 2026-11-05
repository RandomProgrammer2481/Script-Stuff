<template>
    <div>
        <h2>Log In</h2>
        <Form :auth="auth" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { Auth } from '../store.js';
import { useRouter } from 'vue-router';
import Form from '../components/Form.vue';
import { getRequest, postRequest } from '../../../services/http/index.js';

const router = useRouter();

const auth = ref({
    email: '',
    password: ''
});

const handleSubmit = async (data: Auth) => {
    await getRequest('/sanctum/csrf-cookie').then(async response => {
        console.log(data)
        await postRequest('login', data)
    });

    router.push('/tickets')
};
</script>