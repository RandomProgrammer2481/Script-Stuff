import { createRouter, createWebHistory } from 'vue-router';
import { ticketRoutes } from '../domains/tickets/routes';
import { authRoutes } from '../domains/auth/routes';
import { isAuthenticated } from '../domains/auth/store';
import { userRoutes } from '../domains/users/routes';

export const router = createRouter({
    history: createWebHistory(),
    routes: [...ticketRoutes, ...authRoutes, ...userRoutes]
});

router.beforeEach(async (to) => {
    if (to.meta.public) return true;

    if (!(await isAuthenticated())) {
        return { name: 'auth.login' };
    }

    return true;
})