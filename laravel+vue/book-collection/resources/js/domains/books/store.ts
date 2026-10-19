import axios from 'axios';
import { ref, computed } from 'vue';

// state
const books = ref([]);

// getters
export const getAllBooks = computed(() => books.value);

// actions
export const fetchBooks = async () => {
    const {data} = await axios.get('/api/books');
    if(!data) return
    books.value = data;
};

export const createBook = async (newBook: any) => {
    const {data} = await axios.post('/api/books', newBook);
    if(!data) return
    books.value = data;
};