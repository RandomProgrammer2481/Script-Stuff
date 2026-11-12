import { storeModuleFactory } from "../../services/store.ts";
import { Category } from "../categories/store.js";
import { User } from "../users/store.js";

export interface Ticket {
    'id': number
    'title': string,
    'body': string,
    'created_at'? : Date,
    'updated_at'? : Date,
    'categories': Array<Category>,
    'status'? : Status,
    'creator'? : User,
    'assignee'? : User
}

export interface Status {
    'id': number,
    'title': string
}



export const ticketStore = storeModuleFactory<Ticket>('tickets')