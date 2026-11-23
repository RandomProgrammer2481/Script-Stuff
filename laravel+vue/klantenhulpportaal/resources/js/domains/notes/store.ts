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

export const noteStore = storeModuleFactory<Note>("notes")