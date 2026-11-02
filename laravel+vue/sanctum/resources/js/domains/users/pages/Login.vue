<template>
    <div>
        <h2>Log In</h2>
        <Form :user="user" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { User } from '../store.js';
import { useRouter } from 'vue-router';
import Form from '../components/Form.vue';
import { getRequest, postRequest } from '../../../services/http/index.js';

const router = useRouter();

const user = ref({
    email: '',
    password: ''
});

const handleSubmit = async (data: User) => {
    await getRequest('/sanctum/csrf-cookie').then(async response => {
        console.log(data)
        await postRequest('login', data)
    });
    router.push('/me')
};
</script>