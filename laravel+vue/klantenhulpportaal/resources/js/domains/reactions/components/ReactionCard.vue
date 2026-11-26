<template>
    <div>
        <p>{{ reaction.user.name}} heeft gereageerd op {{ reaction.created_at }}</p>
        <p>{{ reaction.body }}</p>
        <button @click="clicked">Edit</button>
    </div>
</template>
<script setup lang="ts">
import { ref } from 'vue';


const props = defineProps({reaction: Object})
const reaction =  ref({...props.reaction})

const emit = defineEmits(['edit'])

const clicked = () => {
    emit('edit')
}


</script>