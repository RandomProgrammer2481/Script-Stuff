import axios from 'axios';
import { ref, computed, Ref } from 'vue';

export interface Author{
    id: number;
    name: string;
}
export interface AuthorsRef extends Ref<Author[]>{}

// state
const authors: AuthorsRef = ref([]);

// getters
export const getAllAuthors = computed(() => authors.value);

// actions
export const fetchAuthors = async () => {
    const {data} = await axios.get('/api/authors');
    if(!data) return
    authors.value = data;
};
