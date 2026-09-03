<script setup lang="ts">
import {ref, reactive, computed, watch} from 'vue';
import type {Item} from '../store';

const props = defineProps<{
    item: Item;
}>();
const emit = defineEmits(['submit']);

const submit = (item: Item) => {
    emit('submit', item);
};

const currentItem = ref<Item>({...props.item});
watch(
    () => props.item,
    newItem => {
        currentItem.value = {...newItem};
    },
);
</script>

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
