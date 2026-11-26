import { computed } from "vue";
import { storeModuleFactory } from "../../services/store.ts";
import { getRequest, patchRequest, postRequest } from "../../services/http/index.js";
import { User } from "../users/store.js";
import { Ticket } from "../tickets/store.js";

export interface Reaction {
    'id': number,
    'body': string,
    'user': User,
    'created_at': Date,
    'updated_at': Date
    'ticket': Ticket
}



const baseReactionStore = storeModuleFactory<Reaction>("reactions")

export const reactionStore = {
    setters: {...baseReactionStore.setters},
    getters: {
        ...baseReactionStore.getters,

        getByTicketId: (ticketId: number) => computed(() => 
            Object.values(baseReactionStore.getters.all.value)
            .filter(reaction => reaction.ticket.id === ticketId))
    },
    actions: {
        ...baseReactionStore.actions,

        fetchByTicketId: async (ticketId: number) => {
            const {data} = await getRequest(`tickets/${ticketId}/reactions`);
            if (!data) return;
            baseReactionStore.setters.clearAll()
            baseReactionStore.setters.setAll(data);
        },

        create: async (ticketId: number, reaction: Reaction) => {
                    const {data} = await postRequest(`tickets/${ticketId}/notes`, reaction);
                    if (!data ) return;
                    baseReactionStore.setters.set(data)
        
                }
    }
}