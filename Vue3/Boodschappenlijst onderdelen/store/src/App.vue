<script setup lang="ts">
import {ref, reactive, computed} from 'vue';

import {RouterLink} from 'vue-router';
</script>

<template>
    <RouterLink to="/">Go to Overview</RouterLink>
    <RouterLink to="/create">Create Something</RouterLink>

    <routerView></routerView>
</template>
