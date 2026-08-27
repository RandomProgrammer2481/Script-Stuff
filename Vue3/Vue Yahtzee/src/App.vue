<script setup lang="ts">
import {ref, reactive, computed} from 'vue';
import ScoreTable from './components/ScoreTable.vue';
import ThrownDice from './components/ThrownDice.vue';

let dice = ref<Array<number>>([]);

const handleDice = (newDice: Array<number>) => {
    dice.value = newDice;
};
</script>

<template>
    <ThrownDice @update-dice="handleDice"></ThrownDice>
    <ScoreTable :dice="dice"></ScoreTable>
    <h4>
        Dice Textures by
        <a href="https://kicked-in-teeth.itch.io/dice-roll">Kicked in the teeth</a>
    </h4>
</template>
