import { storeModuleFactory } from "../../services/store.ts";

export interface Ticket {
    'id': number
    'title': string,
    'body': string,
    'created_at': Date,
    'updated_at': Date,
    'category_id': number,
    'status_id': number,
    'creator_id': number,
    'assignee_id': number
}

export const ticketStore = storeModuleFactory('tickets')