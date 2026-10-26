import axios from 'axios';
import { ref, computed, ComputedRef, Ref } from 'vue';

export interface Book{
    id: any;
    title: string;
    summary: string;
    author_id: any;
}

interface BooksRef extends Ref<Book[]>{}
export type BookUpdate = Partial<Omit<Book, 'id'>>;
export type NewBook = Omit<Book, 'id'>;

// state
const books: BooksRef = ref([]);

// getters
export const getAllBooks: ComputedRef = computed(() => books.value);
export const getBookById = (id: number) => computed(() => books.value.find(book => book.id == id));


// actions
export const fetchBooks = async () => {
    const {data} = await axios.get('/api/books');
    if(!data) return
    books.value = data;
};

export const createBook = async (newBook: NewBook) => {
    const {data} = await axios.post('/api/books', newBook);
    if(!data) return
    books.value = data;
};

export const updateBook = async (id: number, updatedBook: BookUpdate) => {
    const { data } = await axios.put(`/api/books/${id}`, updatedBook);
    if (!data) return;
    books.value = data;
};

