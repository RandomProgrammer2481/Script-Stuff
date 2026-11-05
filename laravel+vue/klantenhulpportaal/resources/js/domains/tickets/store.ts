import { storeModuleFactory } from "../../services/store.ts";
import { User } from "../users/store.js";

export interface Ticket {
    'id': number
    'title': string,
    'body': string,
    'created_at': Date,
    'updated_at': Date,
    'categories': Array<Category>,
    'status': Status,
    'creator': User,
    'assignee': User
}

export interface Status {
    'id': number,
    'title': string
}

export interface Category {
    'id': number,
    'title': string,
    'created_at': Date,
}

export const ticketStore = storeModuleFactory<Ticket>('tickets')