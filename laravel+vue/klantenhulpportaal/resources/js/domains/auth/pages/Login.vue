<template>
    <div>
        <h2>Log In</h2>
        <Form :credentials="credentials" @submit="handleSubmit" />
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import Form from '../components/Form.vue';
import { getRequest, postRequest } from '../../../services/http/index.js';
import { auth } from './../../auth/store.js';
import { useRouter } from 'vue-router';

const router = useRouter();

const {fetchUser} = auth()

const credentials = ref({
    email: '',
    password: ''
});

const handleSubmit = async (auth: any) => {
    await getRequest('/sanctum/csrf-cookie').then(async response => {
        await postRequest('/auth/login', auth)
        

        await fetchUser()
        router.push({name: 'tickets.index'})
    });
};

</script>