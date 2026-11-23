import { patchRequest } from "../../services/http/index.js";
import { storeModuleFactory } from "../../services/store.ts";
import { Category } from "../categories/store.js";
import { Status } from "../statuses/store.js";
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



const baseTicketStore = storeModuleFactory<Ticket>('tickets')

export const ticketStore = {
    getters: {...baseTicketStore.getters},
    setters: {...baseTicketStore.setters},
    actions: {...baseTicketStore.actions,
        assign: async (ticketId: number, assignee_id: number) => {
            const { data } = await patchRequest(`tickets/${ticketId}/assignee`, assignee_id)
            if (!data) return;
            baseTicketStore.setters.set(data);
        },
        updateStatus: async (ticketId: number, status_id: number) => {
            const { data } = await patchRequest(`tickets/${ticketId}/status`, status_id)
            if (!data) return;
            baseTicketStore.setters.set(data);
        }
    }
}