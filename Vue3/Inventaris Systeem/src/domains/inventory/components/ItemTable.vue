<script setup lang="ts">
import {ref, reactive, computed} from 'vue';
import {deleteItem} from '../store';
import {router} from '../../../router';

const props: any = defineProps({
    inventory: {},
});

const editItem = (id: number) => {
    router.push('edit/' + id);
};

const goToAddItem = () => {
    router.push('create');
};
</script>

<template>
    <div>
        <h4>Inventory</h4>
        <table>
            <thead>
                <tr>
                    <th class="ItemTableContent">Name</th>
                    <th class="ItemTableContent">Minimum Amount</th>
                    <th class="ItemTableContent">Current Amount</th>
                    <th class="ItemTableContent">Edit</th>
                    <th class="ItemTableContent">Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr class="ItemTableContent" v-for="(item, index) in inventory" :key="index">
                    <td class="ItemTableContent">{{ item.name }}</td>
                    <td class="ItemTableContent">{{ item.minimumAmount }}</td>
                    <td class="ItemTableContent"><input type="number" v-model="item.actualAmount" /></td>
                    <td class="ItemTableContent"><button @click="editItem(item.id)">Edit</button></td>
                    <td class="ItemTableContent"><button @click="deleteItem(item.id)">Delete</button></td>
                </tr>
                <tr class="ItemTableContent">
                    <td class="ItemTableContent" colspan="3">Add a new item!</td>
                    <td class="ItemTableContent" colspan="2">
                        <button @click="goToAddItem">Add</button>
                    </td class="ItemTableContent">
                </tr>
            </tbody>
        </table>
    </div>
</template>
