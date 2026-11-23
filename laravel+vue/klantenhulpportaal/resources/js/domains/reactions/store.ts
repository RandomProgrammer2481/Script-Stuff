import { computed } from "vue";
import { storeModuleFactory } from "../../services/store.ts";
import { User } from "../users/store.js";
import { getRequest } from "../../services/http/index.js";
import { Ticket } from "../tickets/store.js";

export interface Reaction {
    'id': number,
    'body': string,
    'user': User,
    'created_at': Date,
    'updated_at': Date
    'ticket': Ticket
}


// Voeg functionaliteit om te filteren bij ticket toe hier
const baseReactionStore = storeModuleFactory<Reaction>("reactions")

export const reactionStore = {
    setters: {...baseReactionStore.setters},
    getters: {...baseReactionStore.getters,
        getByTicketId: (ticketId: number) => computed(() => 
            Object.values(baseReactionStore.getters.all.value)
            .filter(reaction => reaction.ticket.id === ticketId))
    },
    actions: {...baseReactionStore.actions,
        fetchByTicketId: async (ticketId: number) => {
            baseReactionStore.setters.clearAll()
            const {data} = await getRequest(`reactions/${ticketId}`);
            if (!data) return;
            baseReactionStore.setters.setAll(data);
        }
    }
}