<script setup lang="ts">
import {ref, computed} from 'vue';
import {deleteGrocery} from '../domains/groceries/store';

let total = computed(() => {
    let sum = 0;
    for (let i = 0; i < groceries.length; i++) {
        sum += groceries[i].amount * groceries[i].price;
    }
    return sum;
});

const groceries: any = defineModel();
</script>

<template>
    <div>
        <h4>BoodschappenLijstje</h4>
        <table>
            <thead>
                <tr>
                    <th>name</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Subtotal</th>
                    <th>Edit Button</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(grocery, index) in groceries" :key="index">
                    <td>{{ grocery.name }}</td>
                    <td>{{ grocery.price }}</td>
                    <td><input type="number" v-model="grocery.amount" /></td>
                    <td>{{ (grocery.price * grocery.amount).toFixed(2) }}</td>
                    <td><router-link :to="`/edit/${grocery.id}`">Edit</router-link></td>
                    <td><button @click="deleteGrocery(grocery.id)">Delete</button></td>
                </tr>
                <tr>
                    <td colspan="3">Total</td>
                    <td>{{ total }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
