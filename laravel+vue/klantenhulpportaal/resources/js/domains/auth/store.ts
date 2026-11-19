import { computed, ref } from 'vue';
import { getRequest, postRequest } from '../../services/http';
import { User } from '../users/store';
import { ticketStore } from '../tickets/store';
import { categoryStore } from '../categories/store';
import { reactionStore } from '../reactions/store';


const user = ref<User | null>(null);

const isAuthenticated = computed(() => user.value !== null);
const isAdmin = computed(() => user.value?.is_admin === true);
const userId = computed(() => user.value?.id ?? null);

async function fetchUser() {
    const { data } = await getRequest('/auth/me');
    if(!data) return;
    user.value = data
}


async function logout() {
    await postRequest('/auth/logout', '');
    clearStores()
    user.value = null;
}


// clear the stores on logout
function clearStores() {
    ticketStore.setters.clearAll()
    categoryStore.setters.clearAll()
    reactionStore.setters.clearAll()
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