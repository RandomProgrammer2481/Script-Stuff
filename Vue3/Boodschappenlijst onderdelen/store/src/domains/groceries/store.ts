import {ref, reactive, computed} from 'vue';
// State
const groceries = ref([
    {name: 'apples', price: 0.48, amount: 3, id: 1},
    {name: 'ibuprofen', price: 1.99, amount: 2, id: 2},
    {name: 'toilet paper', price: 4.99, amount: 1, id: 3},
    {name: 'milk', price: 1.29, amount: 2, id: 4},
    {name: 'bananas', price: 0.29, amount: 5, id: 5},
]);

// Getters
export const getAllGroceries = computed(() => groceries.value);
export const getGroceryById = (id: number) => computed(() => groceries.value.find(grocery => grocery.id == id));

// Actions
export const addGrocery = (grocery: {name: string; price: number; amount: number; id: number}) =>
    groceries.value.push(grocery);

export const updateGrocery = (newGrocery: {name: string; price: number; amount: number; id: number}) => {
    groceries.value[findGroceryIndex(newGrocery.id)] = newGrocery;
};

export const deleteGrocery = (id: number) => {
    const indexToRemove = findGroceryIndex(id);

    if (indexToRemove >= 0 && indexToRemove < groceries.value.length) {
        groceries.value.splice(indexToRemove, 1);
    }
};

const findGroceryIndex = (id: number) => {
    const groceryIndex: number = groceries.value.findIndex(grocery => grocery.id === id);

    if (groceryIndex === -1) {
        console.warn(`Grocery with id ${id} not found`);
        return 0;
    }
    return groceryIndex;
};
