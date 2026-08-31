<script setup lang="ts">
import {ref, reactive, computed} from 'vue';
import ItemTable from '../components/ItemTable.vue';
import {getAllItems} from '../store';

const inventory = ref([...getAllItems.value].filter(item => item.actualAmount < item.minimumAmount));
</script>

<template>
    <ItemTable :inventory="inventory"></ItemTable>
</template>
