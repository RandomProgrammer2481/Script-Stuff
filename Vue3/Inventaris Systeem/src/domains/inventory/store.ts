import {ref, reactive, computed} from 'vue';

export interface Item {
    id: number;
    name: string;
    actualAmount: number;
    minimumAmount: number;
}

//State
const inventory = ref<Item[]>([
    {id: 23245, name: 'Electric Lawnmower', actualAmount: 12, minimumAmount: 4},
    {id: 40738, name: 'Hedgetrimmer', actualAmount: 5, minimumAmount: 6},
    {id: 34661, name: 'Shovel', actualAmount: 13, minimumAmount: 10},
    {id: 25565, name: 'Hoe', actualAmount: 42, minimumAmount: 15},
    {id: 11111, name: 'Mulch', actualAmount: 12, minimumAmount: 25},
    {id: 43562, name: 'Trowell', actualAmount: 19, minimumAmount: 32},
    {id: 99382, name: 'Gasoline Powered Lawnmover', actualAmount: 2, minimumAmount: 3},
]);

// Getters
export const getAllItems = computed(() => inventory.value);
export const getItemById = (id: number) => computed(() => inventory.value.find(Item => Item.id == id));

// Actions
export const addItem = (Item: Item) => inventory.value.push(Item);

export const updateItem = (newItem: Item) => {
    inventory.value[findItemIndex(newItem.id)] = newItem;
};

export const deleteItem = (id: number) => {
    const indexToRemove = findItemIndex(id);

    if (indexToRemove >= 0 && indexToRemove < inventory.value.length) {
        inventory.value.splice(indexToRemove, 1);
    }
};

const findItemIndex = (id: number) => {
    const ItemIndex: number = inventory.value.findIndex(Item => Item.id === id);

    if (ItemIndex === -1) {
        console.warn(`Item with id ${id} not found`);
        return 0;
    }
    return ItemIndex;
};
