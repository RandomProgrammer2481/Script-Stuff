<template>
  <div v-if="authenticated" class="flex items-center gap-4 p-4 border-b">
    <RouterLink :to="{ name: 'tickets.index' }">View ticket index</RouterLink>
    <RouterLink :to="{ name: 'tickets.create' }">Make a new ticket</RouterLink>
    <a href="#" class="ml-auto" @click.prevent="logout">Log out</a>
  </div>

  <RouterView class="p-4" />
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

<style src="@vueform/multiselect/themes/default.css"></style>
