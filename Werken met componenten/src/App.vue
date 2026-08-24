<script setup lang="ts">
import {ref, reactive, computed} from 'vue';
import parentComponent from './components/parentComponent.vue';
import parentComponent2 from './components/defineModelParentComponent.vue';
</script>

<template>
    <h3>Opdracht 1</h3>
    <parentComponent></parentComponent>

    <h3>Opdracht 2</h3>
    <parentComponent2></parentComponent2>
</template>
