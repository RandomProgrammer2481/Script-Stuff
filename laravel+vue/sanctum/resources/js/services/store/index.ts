import { ref, computed, Ref } from 'vue';
import { deleteRequest, getRequest, postRequest, putRequest } from '../http';

export const storeModuleFactory = <T extends { id: number }>(moduleName: string) => {
    const state = ref<Record<string | number, Readonly<T>>>({});

    const getters = {
        all: computed(() => state.value),
        getById: (id: number) => computed(() => state.value[id])
    };

    const setters = {
        setAll: (items: T[]) => {
            for (const item of items) state.value[item.id] = Object.freeze(item);
        },

        deleteById: (id: number) => {
            delete state.value[id];
        }
    };

    const actions = {
        getAll: async () => {
            const { data } = await getRequest(moduleName);
            if (!data) return;
            setters.setAll(data);
        },

        create: async (item: T) => {
            const { data } = await postRequest(moduleName, item);
            if (!data) return;
            setters.setAll(data);
        },

        update: async (id: number, item: T) => {
            const { data } = await putRequest(`${moduleName}/${id}`, item);
            if (!data) return;
            setters.setAll(data);
        },

        delete: async (id: number) => {
            await deleteRequest(`${moduleName}/${id}`);
            setters.deleteById(id);
        },

    };

    return { getters, setters, actions };
};
