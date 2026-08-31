import {createWebHistory, createRouter} from 'vue-router';
import {routes} from '../domains/inventory/routes';

export const router = createRouter({
    history: createWebHistory(),
    routes,
});
