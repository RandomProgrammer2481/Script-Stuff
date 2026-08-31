<script setup lang="ts">
import {ref, reactive, computed} from 'vue';
import GroceriesTable from '../../../components/GroceriesTable.vue';
import GroceryForm from '../components/GroceryForm.vue';
import {getAllGroceries} from '../store.ts';
</script>

<template>
    <GroceriesTable v-model="getAllGroceries"></GroceriesTable>
</template>
