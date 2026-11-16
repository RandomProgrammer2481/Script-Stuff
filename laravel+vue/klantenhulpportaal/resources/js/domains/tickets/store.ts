import { patchRequest } from "../../services/http/index.js";
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



const baseTicketStore = storeModuleFactory<Ticket>('tickets')

export const ticketStore = {
    getters: {...baseTicketStore.getters},
    setters: {...baseTicketStore.setters},
    actions: {...baseTicketStore.actions,
        assign: async (ticketId: number, assignee: User) => {
            const { data } = await patchRequest(`tickets/${ticketId}/assign`, assignee)
            if (!data) return;
            baseTicketStore.setters.setAll(data);
        }
    }
}