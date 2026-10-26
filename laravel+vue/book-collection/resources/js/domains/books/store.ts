import { ref, computed, ComputedRef, Ref } from 'vue';
import { deleteRequest, getRequest, postRequest, putRequest } from '../../services/http';

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
    const {data} = await getRequest('/books');
    if(!data) return
    books.value = data;
};

export const createBook = async (newBook: NewBook) => {
    const {data} = await postRequest('/books', newBook);
    if(!data) return
    books.value = data;
};

export const updateBook = async (id: number, updatedBook: BookUpdate) => {
    const { data } = await putRequest(`/books/${id}`, updatedBook);
    if (!data) return;
    books.value = data;
};

export const deleteBook = async (id: number) => {
    await deleteRequest(`/books/${id}`);
    books.value = books.value.filter(book => book.id !== id);
};

