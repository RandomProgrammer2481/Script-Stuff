<script setup lang="ts">
import {computed} from 'vue';
import ItemTable from '../components/ItemTable.vue';
import {getAllItems} from '../store';

const inventory = computed(() => getAllItems.value.filter(item => item.actualAmount < item.minimumAmount));
</script>

<template>
    <ItemTable v-if="inventory" :inventory="inventory"></ItemTable>
</template>
