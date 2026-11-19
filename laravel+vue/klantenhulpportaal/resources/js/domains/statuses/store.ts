import { storeModuleFactory } from "../../services/store.ts";

export interface Status {
    'id': number,
    'title': string,
    'created_at': Date,
    'updated_at': Date
}

export const statusStore = storeModuleFactory<Status>("statuses")