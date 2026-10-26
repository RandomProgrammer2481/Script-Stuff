import { ref, computed, Ref } from 'vue';
import { deleteRequest, getRequest, postRequest, putRequest } from '../../services/http';

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
    const {data} = await getRequest('/authors');
    if(!data) return
    authors.value = data;
};

export const createAuthor = async (newAuthor: NewAuthor) => {
    const {data} = await postRequest('/authors', newAuthor);
    if(!data) return
    authors.value = data;
};

export const updateauthor = async (id: number, updatedauthor: AuthorUpdate) => {
    const { data } = await putRequest(`/authors/${id}`, updatedauthor);
    if (!data) return;
    authors.value = data;
};

export const deleteauthor = async (id: number) => {
    await deleteRequest(`/authors/${id}`);
    authors.value = authors.value.filter(author => author.id !== id);
};


