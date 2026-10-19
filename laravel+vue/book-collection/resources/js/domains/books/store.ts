import axios from 'axios';
import { ref, computed, Ref } from 'vue';

// state
const books:Ref = ref([]);

// getters
export const getAllBooks = computed(() => books.value);

// actions
export const fetchBooks = async () => {
    const {data} = await axios.get('/api/books');
    if(!data) return
    books.value = data;
};