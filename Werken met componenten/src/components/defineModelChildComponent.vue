<script setup lang="ts">
import {ref, reactive, computed} from 'vue';

const message = defineModel();
</script>

<template>
    <input v-model="message" placeholder="type something.." />
</template>
