import { ref, computed, Ref } from 'vue';
import { deleteRequest, getRequest, patchRequest, postRequest, putRequest } from '../http';

export const storeModuleFactory = <T extends { id: number }>(moduleName: string) => {
    const state = ref<Record<string | number, Readonly<T>>>({});

    const getters = {
        all: computed(() => state.value),
        getById: (id: number) => computed(() => state.value[id]),
    };

    const setters = {
        setAll: (items: T[]) => {
            for (const item of items) setters.set(item);
        },

        set: (item: T) => state.value[item.id] = Object.freeze(item),
        
        clearAll: () => {state.value = {}},

        replaceAll: (items: T[]) => {
            const next: Record<string | number, Readonly<T>> = {};
            for (const item of items) next[item.id] = Object.freeze(item);
            state.value = next;
        },

        deleteById: (id: number) => {
            delete state.value[id];
        }
    };

    const actions = {
        fetchAll: async () => {
            const { data } = await getRequest(moduleName);
            if (!data) return;
            setters.replaceAll(data);
        },
        
        create: async (item: T) => {
            const { data } = await postRequest(moduleName, item);
            if (!data) return;
            setters.set(data);
        },

        update: async (id: number, item: Partial<T>) => {
            const { data } = await patchRequest(`${moduleName}/${id}`, item);
            if (!data) return;
            setters.set(data);
        },

        delete: async (id: number) => {
            await deleteRequest(`${moduleName}/${id}`);
            setters.deleteById(id);
        },

    };

    return { getters, setters, actions };
};
