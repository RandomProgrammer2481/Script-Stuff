import { storeModuleFactory } from "../../services/store.ts";

export interface Category {
    'id': number,
    'title': string,
    'created_at': Date,
}

export const categoryStore = storeModuleFactory<Category>("categories")