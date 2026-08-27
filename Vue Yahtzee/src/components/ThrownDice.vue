<script setup lang="ts">
import {ref, reactive, computed} from 'vue';

let dice = ref<Array<number>>([]);

const emit = defineEmits(['updateDice']);

const emitDice = () => {
    emit('updateDice', dice.value);
};

const rollDice = () => {
    dice.value = [];

    for (let i = 0; i < 5; i++) {
        let randomNumber = Math.floor(Math.random() * 6) + 1;
        dice.value.push(randomNumber);
    }
    emitDice();
};
</script>

<template>
    <div>
        <button @click="rollDice">Gooi!</button>
        <table>
            <tbody>
                <tr>
                    <td v-for="(die, index) in dice" :key="index">
                        <img :src="`/dice/${die}.png`" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
