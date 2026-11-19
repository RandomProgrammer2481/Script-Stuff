import { createRouter, createWebHistory, RouteLocationNormalized } from 'vue-router';
import { ticketRoutes } from '../domains/tickets/routes';
import { authRoutes } from '../domains/auth/routes';
import { userRoutes } from '../domains/users/routes';
import { errorRoutes } from '../domains/errors/routes';
import { auth } from '../domains/auth/store';
import { categoryRoutes } from '../domains/categories/routes';

declare module 'vue-router' {
    interface RouteMeta {
        public?: boolean
        adminOnly?: boolean
        /** Resolves the ID of the user who owns this route's resource. Admins always pass. */
        ownerOnly?: (to: RouteLocationNormalized) => Promise<string | number | null | undefined> | string | number | null | undefined
    }
}

const { isAuthenticated, isAdmin, userId, fetchUser} = auth()

export const router = createRouter({
    history: createWebHistory(),
    routes: [...ticketRoutes, ...authRoutes, ...userRoutes, ...errorRoutes, ...categoryRoutes]
});

router.beforeEach(async (to) => {
    await fetchUser()
    if (to.meta.public) return true

    if (isAuthenticated.value === false) {
        return { name: 'auth.login' }
    }

    if (to.meta.adminOnly && isAdmin.value === false) {
        return { name: 'errors.403' }
    }

    if (to.meta.ownerOnly) {
        if (isAdmin.value === true) return true

        const ownerId  = await to.meta.ownerOnly(to)

        if (ownerId == null || userId.value == null || String(ownerId) !== String(userId.value)) {
            return { name: 'errors.403' }
        }
    }

    return true
})