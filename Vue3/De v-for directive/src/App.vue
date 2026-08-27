<script setup lang="ts">
import { ref } from "vue";

const tasks = ref([
  { name: "Boodschappen doen", completed: false },
  { name: "Afwassen", completed: true },
  { name: "Hond uitlaten", completed: false },
]);
</script>

<template>
  <h1>TakenLijst</h1>
  <ul>
    <li v-for="(task, index) in tasks" :key="index">
      {{ task.name }}
      {{ task.completed ? "(voltooid)" : "(niet voltooid)" }}
      <button @click="task.completed = !task.completed">Toggle</button>
    </li>
  </ul>
</template>
