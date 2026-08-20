<script setup lang="ts">
import {ref, reactive, computed} from 'vue';

const clicks = ref(0);
const person = reactive({firstName: '', country: ''});

const incrementClicks = () => {
    clicks.value++;
};
const changeCountry = (newCountry: string) => {
    person.country = newCountry;
};
</script>

<template>
    Naam: {{ person.firstName }}
    <br />
    Land: {{ person.country }}
    <br />
    Clicks: {{ clicks }}
    <br />
    <div>
        <input v-model="person.firstName" type="text" placeholder="Vul hier je naam in" />
        <br />
        <button @click="changeCountry('Nederland')">Nederland</button>
        <button @click="changeCountry('België')">België</button>
        <br />
        <button @click="incrementClicks">Klik mij!</button>
    </div>
</template>

<style scoped></style>
