<script setup lang="ts">
import {getAllItems} from '../store';
import ItemTable from '../components/ItemTable.vue';

const inventory = getAllItems;
</script>

<template>
    <ItemTable v-if="inventory" :inventory="inventory"></ItemTable>
</template>
