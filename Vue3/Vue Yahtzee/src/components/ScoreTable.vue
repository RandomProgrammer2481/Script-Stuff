<script setup lang="ts">
import {ref, reactive, computed} from 'vue';

const props = defineProps<{
    dice: number[];
}>();

let diceCount = computed(() => {
    let sortedDice: Record<number, number> = {
        1: 0,
        2: 0,
        3: 0,
        4: 0,
        5: 0,
        6: 0,
    };

    for (let i = 0; i < props.dice.length; i++) {
        sortedDice[props.dice[i]]++;
    }

    return sortedDice;
});

let ones = computed(() => {
    return diceCount.value[1];
});
let twos = computed(() => {
    return diceCount.value[2] * 2;
});
let threes = computed(() => {
    return diceCount.value[3] * 3;
});
let fours = computed(() => {
    return diceCount.value[4] * 4;
});
let fives = computed(() => {
    return diceCount.value[5] * 5;
});
let sixes = computed(() => {
    return diceCount.value[6] * 6;
});

let sumPartOne = computed(() => {
    let sum = ones.value + twos.value + threes.value + fours.value + fives.value + sixes.value;
    return sum;
});

let checkMultiple = computed(() => {
    let multipleType = '';
    let tripleExists = false;
    let doubleExists = false;
    for (let i = 0; i < Object.keys(diceCount.value).length; i++) {
        if (diceCount.value[i] == 5) {
            multipleType = 'yahtzee';
        } else if (diceCount.value[i] == 4) {
            multipleType = 'fourofakind';
        } else if (diceCount.value[i] == 3) {
            tripleExists = true;
        } else if (diceCount.value[i] == 2) {
            doubleExists = true;
        }

        if (tripleExists) {
            if (doubleExists) {
                multipleType = 'fullhouse';
            } else {
                multipleType = 'threeofakind';
            }
        }
    }

    return multipleType;
});

let checkStreet = computed(() => {
    let orderedDice = [...props.dice].sort((a, b) => a - b);
    let orderCount = 0;

    for (let i = 0; i < orderedDice.length; i++) {
        if (orderedDice[i] == orderedDice[i - 1] + 1) {
            orderCount++;
        }
    }

    if (orderCount == 5) {
        return 'big';
    } else if (orderCount == 4) {
        return 'small';
    } else {
        return '';
    }
});

let yahtzee = computed(() => {
    let score = 0;
    if (checkMultiple.value == 'yahtzee') {
        score = 50;
    }
    return score;
});

let fourofakind = computed(() => {
    let score = 0;
    if (checkMultiple.value == 'fourofakind') {
        score = sumPartOne.value;
    }
    return score;
});

let fullhouse = computed(() => {
    let score = 0;
    if (checkMultiple.value == 'fullhouse') {
        score = 25;
    }
    return score;
});

let threeofakind = computed(() => {
    let score = 0;
    if (checkMultiple.value == 'threeofakind') {
        score = sumPartOne.value;
    }
    return score;
});

let bigStreet = computed(() => {
    let score = 0;
    if (checkStreet.value == 'big') {
        score = 40;
    }
    return score;
});

let smallStreet = computed(() => {
    let score = 0;
    if (checkStreet.value == 'small') {
        score = 30;
    }
    return score;
});

let sumPartTwo = computed(() => {
    let sum =
        threeofakind.value + fourofakind.value + fullhouse.value + yahtzee.value + bigStreet.value + smallStreet.value;
    return sum;
});

let totalSum = computed(() => {
    let sum = sumPartOne.value + sumPartTwo.value;
    return sum;
});
</script>

<template>
    <div>
        <table>
            <thead>
                <th>DEEL 1</th>
                <th>
                    PUNTEN
                    <br />
                    TELLING
                </th>
                <th>SCORE</th>
            </thead>
            <tbody>
                <tr>
                    <td>EENEN</td>
                    <td>tel alle enen</td>
                    <td>{{ ones }}</td>
                </tr>
                <tr>
                    <td>TWEEËN</td>
                    <td>tel alle tweeen</td>
                    <td>{{ twos }}</td>
                </tr>
                <tr>
                    <td>DRIEËN</td>
                    <td>tel alle drieen</td>
                    <td>{{ threes }}</td>
                </tr>
                <tr>
                    <td>VIEREN</td>
                    <td>tel alle vieren</td>
                    <td>{{ fours }}</td>
                </tr>
                <tr>
                    <td>VIJVEN</td>
                    <td>tel alle vijven</td>
                    <td>{{ fives }}</td>
                </tr>
                <tr>
                    <td>ZESSEN</td>
                    <td>tel alle zessen</td>
                    <td>{{ sixes }}</td>
                </tr>
                <tr>
                    <td colspan="2">TOTAAL AANTAL PUNTEN</td>
                    <td>{{ sumPartOne }}</td>
                </tr>
                <tr>
                    <td>
                        EXTRA BONUS
                        <br />
                        Als puntentotaal => 63
                    </td>
                    <td>35 punten</td>
                    <td>0</td>
                </tr>
                <tr>
                    <th colspan="2">TOTAAL DEEL 1</th>
                    <td>{{ sumPartOne }}</td>
                </tr>
                <tr><td colspan="3"></td></tr>
            </tbody>
            <thead>
                <th>DEEL 2</th>
                <th>
                    PUNTEN
                    <br />
                    TELLING
                </th>
                <th>SCORE</th>
            </thead>
            <tbody>
                <tr>
                    <td>THREE OF A KIND</td>
                    <td>
                        totaal v.d.
                        <br />
                        5 stenen
                    </td>
                    <td>{{ threeofakind }}</td>
                </tr>
                <tr>
                    <td>CARRE</td>
                    <td>
                        totaal v.d.
                        <br />
                        5 stenen
                    </td>
                    <td>{{ fourofakind }}</td>
                </tr>
                <tr>
                    <td>FULL HOUSE</td>
                    <td>25 punten</td>
                    <td>{{ fullhouse }}</td>
                </tr>
                <tr>
                    <td>KLEINE STRAAT</td>
                    <td>30 punten</td>
                    <td>{{ smallStreet }}</td>
                </tr>
                <tr>
                    <td>GROTE STRAAT</td>
                    <td>40 punten</td>
                    <td>{{ bigStreet }}</td>
                </tr>
                <tr>
                    <td>YAHTZEE</td>
                    <td>50 punten</td>
                    <td>{{ yahtzee }}</td>
                </tr>
                <tr>
                    <td>CHANGE</td>
                    <td>
                        totaal v.d.
                        <br />
                        5 stenen
                    </td>
                    <td>{{ sumPartOne }}</td>
                </tr>
                <tr>
                    <th colspan="2">TOTAAL DEEL 2</th>
                    <td>{{ sumPartTwo }}</td>
                </tr>
                <tr>
                    <th colspan="2">TOTAAL GENERAAL</th>
                    <td>{{ totalSum }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
