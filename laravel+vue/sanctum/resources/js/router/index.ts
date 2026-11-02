import { createRouter, createWebHistory } from 'vue-router';
import { userRoutes } from '../domains/users/routes';

export const router = createRouter({
    history: createWebHistory(),
    routes: [...userRoutes],
})