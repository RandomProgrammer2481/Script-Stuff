import axios from 'axios';
import { ref, computed, Ref } from 'vue';

export interface Author{
    id: number;
    name: string;
}
export interface AuthorsRef extends Ref<Author[]>{}
export type NewAuthor = Omit<Author, 'id'>;
export type AuthorUpdate = Partial<Omit<Author, 'id'>>;

// state
const authors: AuthorsRef = ref([]);

// getters
export const getAllAuthors = computed(() => authors.value);
export const getauthorById = (id: number) => computed(() => authors.value.find(author => author.id == id));

// actions
export const fetchAuthors = async () => {
    const {data} = await axios.get('/api/authors');
    if(!data) return
    authors.value = data;
};

export const createAuthor = async (newAuthor: NewAuthor) => {
    const {data} = await axios.post('/api/authors', newAuthor);
    if(!data) return
    authors.value = data;
};

export const updateauthor = async (id: number, updatedauthor: AuthorUpdate) => {
    const { data } = await axios.put(`/api/authors/${id}`, updatedauthor);
    if (!data) return;
    authors.value = data;
};

export const deleteauthor = async (id: number) => {
    await axios.delete(`/api/authors/${id}`);
    authors.value = authors.value.filter(author => author.id !== id);
};


