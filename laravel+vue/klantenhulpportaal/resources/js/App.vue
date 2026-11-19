<template>
  <div v-if="isAuthenticated" class="flex items-center gap-4 p-4 border-b">
    <RouterLink :to="{ name: 'tickets.index' }">View ticket index</RouterLink>
    <RouterLink :to="{ name: 'tickets.create' }">Make a new ticket</RouterLink>
    <RouterLink :to="{ name: 'categories.index' }">View category index</RouterLink>
    <a href="#" class="ml-auto" @click.prevent="handleLogout">Log out</a>
  </div>

  <RouterView class="p-4" />
</template>

<script setup lang="ts">
import { RouterView} from 'vue-router';
import { auth } from './domains/auth/store';
import { router } from './router';

const {isAuthenticated, logout} = auth()

const handleLogout = async () => {
  await logout()
  router.push({name: 'auth.login'})
  
}

</script>

<style src="@vueform/multiselect/themes/default.css"></style>
