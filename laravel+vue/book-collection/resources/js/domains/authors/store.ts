import axios from 'axios';
import { ref, computed, Ref } from 'vue';

// state
const authors:Ref = ref([]);

// getters
export const getAllAuthors = computed(() => authors.value);

// actions
export const fetchAuthors = async () => {
    const {data} = await axios.get('/api/authors');
    if(!data) return
    authors.value = data;
};
