<script setup lang="ts">
import {ref, reactive, computed} from 'vue';

let count = ref<Record<number, number>>({
    1: 0,
    2: 0,
    3: 0,
    4: 0,
    5: 0,
    6: 0,
});
let rollSize = ref();
let roll = [0];

const rollSizeClamped = computed({
    get: () => rollSize.value,
    set: val => {
        const num = Number(val);
        if (isNaN(num)) return;
        rollSize.value = Math.min(999, Math.max(1, num));
    },
});

const rollDice = () => {
    const size = Math.min(999, Math.max(1, rollSize.value));
    let diceArray = [];
    count.value = {
        1: 0,
        2: 0,
        3: 0,
        4: 0,
        5: 0,
        6: 0,
    };

    for (let i = 0; i < size; i++) {
        let randomNumber = Math.floor(Math.random() * 6) + 1;
        count.value[randomNumber]++;
        diceArray.push(randomNumber);
    }
    roll = diceArray;
};
</script>

<template>
    <table style="align-self: center">
        <tbody>
            <tr>
                <td>Numbers:</td>
                <td v-for="(number, index) in count" :key="index">{{ index }}</td>
            </tr>
            <tr>
                <td>Count per number:</td>
                <td v-for="(number, index) in count" :key="index">{{ number }}</td>
            </tr>
        </tbody>
    </table>
    <div>
        <button @click="rollDice">Roll the Dice</button>
        <input type="number" min="1" max="999" v-model="rollSizeClamped" />
    </div>

    <table style="align-self: center">
        <tbody>
            <tr>
                <td>Dice Roll:</td>
                <td v-for="(number, index) in roll" :key="index">
                    {{ number }}
                </td>
            </tr>
        </tbody>
    </table>
</template>
