import { computed } from "vue";
import { storeModuleFactory } from "../../services/store.ts";
import { getRequest } from "../../services/http/index.js";

export interface User {
    'id': number,
    'name': string,
    'email': string,
    'created_at': Date,
    'is_admin': boolean,
};

const baseUserStore = storeModuleFactory<User>('/users')

export const userStore = {
    getters: {...baseUserStore.getters,
        getAdmins: () => computed(() =>
            Object.values(baseUserStore.getters.all.value)
            .filter(user => user.is_admin === true))
    },
    setters: {...baseUserStore.setters},
    actions: {...baseUserStore.actions,
        fetchAdmins: async () => {
            baseUserStore.setters.clearAll()
                const {data} = await getRequest(`users/admins`);
                if (!data) return;
                baseUserStore.setters.setAll(data);
        }
    }
}