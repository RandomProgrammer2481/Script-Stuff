import { storeModuleFactory } from "../../services/store";

export interface User {
    id: number;
    name: string;
    email: string;
    password: string;
}

export const userStore =  storeModuleFactory<User>('users');