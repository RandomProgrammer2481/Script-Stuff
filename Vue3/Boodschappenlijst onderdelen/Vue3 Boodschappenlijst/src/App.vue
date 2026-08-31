<script setup lang="ts">
import {ref, reactive, computed} from 'vue';

let groceries = ref([
    {product: 'apples', price: 0.48, amount: ref(3)},
    {product: 'ibuprofen', price: 1.99, amount: ref(2)},
    {product: 'toilet paper', price: 4.99, amount: ref(1)},
    {product: 'milk', price: 1.29, amount: ref(2)},
    {product: 'bananas', price: 0.29, amount: ref(5)},
]);

let total = computed(() => {
    let sum = 0;
    for (let i = 0; i < groceries.value.length; i++) {
        sum += groceries.value[i].amount * groceries.value[i].price;
    }
    return sum;
});
</script>

<template>
    <div>
        <h4>BoodschappenLijstje</h4>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(grocery, index) in groceries" :key="index">
                    <td>{{ grocery.product }}</td>
                    <td>{{ grocery.price }}</td>
                    <td><input type="number" v-model="grocery.amount" /></td>
                    <td>{{ grocery.price * grocery.amount }}</td>
                </tr>
                <tr>
                    <td colspan="3">Total</td>
                    <td>{{ total }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
