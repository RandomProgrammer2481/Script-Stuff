<script setup lang="ts">
import {ref} from 'vue';
import ChildComponent from './defineModelChildComponent.vue';

const sharedMessage = ref('');
</script>

<template>
    <ChildComponent v-model="sharedMessage" />
    <p>Current Message: {{ sharedMessage }}</p>
</template>
