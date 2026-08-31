<script setup lang="ts">
import {ref, reactive, computed} from 'vue';
import type {item} from '../store';

const props: any = defineProps({
    item: {},
});
const emit = defineEmits(['submit']);

const submit = (item: item) => {
    emit('submit', item);
};

const currentItem = ref({...props.item});
</script>

/// Fix de v-model hieronder. Het geeft niet goed weer in edit

<template>
    <div>
        <form>
            Name:
            <input type="text" v-model="currentItem.name" />
            Minimum Amount:
            <input type="number" step="1" v-model="currentItem.minimumAmount" />
            Current Amount:
            <input type="number" step="1" v-model="currentItem.actualAmount" />
            <button type="button" @click="submit(currentItem)">Submit</button>
        </form>
    </div>
</template>
