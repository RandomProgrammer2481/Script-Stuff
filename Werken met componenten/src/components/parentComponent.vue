<script setup lang="ts">
import {ref} from 'vue';
import ChildComponent from './childComponent.vue';

let message = ref('Hello World!');

const messageTypes = [
    'Hello World!',
    'Do you like jazz?',
    'FooBar',
    'Did you know programmers have a 99% chance of being absolute Nerds?',
    'Dungeons and Dragons is a fun Game',
    'These feel like those horrible loading screen tips some videogames have.',
    'Press the X in the corner of this window to make sure you never see this again',
    "Hey, if you're on linux try this command 'sudo rm -rf ./*'",
    'This is a super secret message',
    "Hey you! You're finally awake.",
];

const handleMessage = () => {
    let randomNumber = Math.floor(Math.random() * 10);
    message.value = messageTypes[randomNumber];
};
</script>

<template>
    <ChildComponent :message="message" @update-message="handleMessage" />
</template>
