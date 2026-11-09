<template>
<a v-if="authenticated" href="#" @click.prevent="logout">Log out.</a>
<RouterView></RouterView>
</template>

<script setup lang="ts">
import { RouterView, useRoute, useRouter } from 'vue-router';
import { postRequest } from './services/http';
import { isAuthenticated } from './domains/auth/store';
import { onMounted, ref, watch } from 'vue';

const router = useRouter();
const route = useRoute();
const authenticated = ref(false);

const refreshAuth = async () => {
  authenticated.value = await isAuthenticated();
};

onMounted(refreshAuth);
watch(() => route.fullPath, refreshAuth); // re-check after login/logout navigation


const logout = async () => {
    await postRequest('/logout', [])
    router.push('/login')}
</script>