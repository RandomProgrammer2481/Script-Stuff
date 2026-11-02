<template>
    <h1>My name {{ user?.name }}</h1>
    <h1>My id {{ user?.id }}</h1>
    <h1>My email {{ user?.email }}</h1>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue'
import type { User } from '../store'
import { getRequest } from '../../../services/http'

const user = ref<User | null>(null)

onMounted(async () => {
  const { data } = await getRequest('/me')
  user.value = data
})
</script>