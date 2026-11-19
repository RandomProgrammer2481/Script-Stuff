import Index from "./pages/index.vue";

export const categoryRoutes = [
    { path: '/categories', component: Index, name: 'categories.index', meta: { adminOnly: true } },
]