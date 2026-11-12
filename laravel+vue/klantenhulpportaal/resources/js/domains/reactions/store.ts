import { storeModuleFactory } from "../../services/store.ts";
import { User } from "../users/store.js";

export interface Reaction {
    'id': number,
    'body': string,
    'user': User,
    'created_at': Date,
    'updated_at': Date
}

export const reactionStore = storeModuleFactory<Reaction>("reactions")