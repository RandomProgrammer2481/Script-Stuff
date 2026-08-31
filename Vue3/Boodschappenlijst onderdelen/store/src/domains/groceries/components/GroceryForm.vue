<script setup lang="ts">
import {ref, reactive, computed} from 'vue';

const props: any = defineProps({
    grocery: {},
});
const emit = defineEmits(['submit']);

const submit = (grocery: {name: string; price: number; amount: number; id: number}) => {
    emit('submit', grocery);
};

const grocery = ref({...props.grocery});
</script>

<template>
    <div>
        <form>
            Name:
            <input type="text" v-model="grocery.name" />
            Price:
            <input type="number" step="0.01" v-model="grocery.price" />
            Amount:
            <input type="number" step="0.01" v-model="grocery.amount" />
            <button type="button" @click="submit(grocery)">Submit</button>
        </form>
    </div>
</template>
