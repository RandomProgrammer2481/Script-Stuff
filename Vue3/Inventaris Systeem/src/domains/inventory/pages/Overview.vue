<script setup lang="ts">
import {ref, reactive, computed} from 'vue';
import ItemTable from '../components/ItemTable.vue';
import {getAllItems} from '../store';

const inventory = ref(getAllItems);
</script>

<template>
    <ItemTable :inventory="inventory"></ItemTable>
</template>
