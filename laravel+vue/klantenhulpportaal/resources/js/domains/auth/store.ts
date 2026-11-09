import { getRequest } from "../../services/http"


export interface Auth {
    'email' : string,
    'password' : string,
}

export const isAuthenticated = async (): Promise<boolean> => {
    try {
        await getRequest('/auth/me');
        return true;
    } catch (e) {
        return false;
    }
}

export const isAdmin = async (): Promise<boolean> => {
    const user = await getRequest('/auth/me');
    const { is_admin } = user.data;
    return Boolean(is_admin);
}