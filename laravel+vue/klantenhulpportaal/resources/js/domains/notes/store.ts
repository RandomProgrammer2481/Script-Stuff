import { computed } from "vue";
import { getRequest, postRequest } from "../../services/http/index.js";
import { storeModuleFactory } from "../../services/store.ts";
import { Ticket } from "../tickets/store.js";
import { User } from "../users/store.js";


export interface Note {
    'id': number,
    'body': string,
    'user': User,
    'ticket': Ticket,
    'created_at': Date,
    'updated_at': Date,
}

const baseNoteStore = storeModuleFactory<Note>("notes")

export const noteStore = {
    setters: {...baseNoteStore.setters},
    getters: {
        ...baseNoteStore.getters,

        getByTicketId: (ticketId: number) => computed(() => 
            Object.values(baseNoteStore.getters.all.value)
            .filter(Note => Note.ticket.id === ticketId))
    },
    actions: {
        ...baseNoteStore.actions,

        fetchByTicketId: async (ticketId: number) => {
            const {data} = await getRequest(`tickets/${ticketId}/notes`);
            if (!data) return;
            baseNoteStore.setters.clearAll()
            baseNoteStore.setters.setAll(data);
        },

        create: async (ticketId: number, note: Note) => {
            const {data} = await postRequest(`tickets/${ticketId}/notes`, note);
            if (!data ) return;
            baseNoteStore.setters.set(data)

        }
    }
}