import { createRouter, createWebHistory, RouteLocationNormalized } from 'vue-router';
import { ticketRoutes } from '../domains/tickets/routes';
import { authRoutes } from '../domains/auth/routes';
import { getUserId, isAdmin, isAuthenticated } from '../domains/auth/store';
import { userRoutes } from '../domains/users/routes';
import { errorRoutes } from '../domains/errors/routes';

declare module 'vue-router' {
    interface RouteMeta {
        public?: boolean
        adminOnly?: boolean
        /** Resolves the ID of the user who owns this route's resource. Admins always pass. */
        ownerOnly?: (to: RouteLocationNormalized) => Promise<string | number | null | undefined> | string | number | null | undefined
    }
}

export const router = createRouter({
    history: createWebHistory(),
    routes: [...ticketRoutes, ...authRoutes, ...userRoutes, ...errorRoutes]
});

router.beforeEach(async (to) => {
    if (to.meta.public) return true

    if (!(await isAuthenticated())) {
        return { name: 'auth.login' }
    }

    if (to.meta.adminOnly && !(await isAdmin())) {
        return { name: 'errors.403' }
    }

    if (to.meta.ownerOnly) {
        if (await isAdmin()) return true

        const [ownerId, userId] = await Promise.all([
            to.meta.ownerOnly(to),
            getUserId(),
        ])

        if (ownerId == null || userId == null || String(ownerId) !== String(userId)) {
            return { name: 'errors.403' }
        }
    }

    return true
})