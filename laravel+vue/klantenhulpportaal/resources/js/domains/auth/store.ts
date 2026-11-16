import { computed, ref } from 'vue';
import { getRequest, postRequest } from '../../services/http';
import { User } from '../users/store';


const user = ref<User | null>(null);

const isAuthenticated = computed(() => user.value !== null);
const isAdmin = computed(() => user.value?.is_admin === true);
const userId = computed(() => user.value?.id ?? null);

async function fetchUser(){
    const { data } = await getRequest('/auth/me');
    if(!data) return;
    user.value = data
}


async function logout() {
    await postRequest('/auth/logout', '');
    user.value = null;
}

export function auth() {
    return {
        isAuthenticated,
        isAdmin,
        userId,
        logout,
        fetchUser,
    }    
}