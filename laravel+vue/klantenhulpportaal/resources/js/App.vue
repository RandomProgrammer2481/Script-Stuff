<template>
<a href="#" @click.prevent="logout">Log out.</a>
<RouterView></RouterView>
</template>

<script setup lang="ts">
import { RouterView } from 'vue-router';
import { postRequest } from './services/http';
import { router } from './router';

const logout = async () => {
    await postRequest('/logout', [])
    router.push('/login')}
</script>