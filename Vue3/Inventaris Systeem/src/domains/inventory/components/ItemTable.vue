<script setup lang="ts">
import {ref, reactive, computed} from 'vue';
import {deleteItem} from '../store';

const props: any = defineProps({
    inventory: {},
});
</script>

<template>
    <div>
        <h4>Inventory</h4>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Minimum Amount</th>
                    <th>Current Amount</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in inventory" :key="index">
                    <td>{{ item.name }}</td>
                    <td>{{ item.minimumAmount }}</td>
                    <td><input type="number" v-model="item.actualAmount" /></td>
                    <td><router-link :to="`/edit/${item.id}`">Edit</router-link></td>
                    <td><button @click="deleteItem(item.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
