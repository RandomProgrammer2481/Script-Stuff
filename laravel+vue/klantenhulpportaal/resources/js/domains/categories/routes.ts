import Create from "./pages/Create.vue";
import Edit from "./pages/Edit.vue";
import Index from "./pages/Index.vue";

export const categoryRoutes = [
    { path: '/categories', component: Index, name: 'categories.index', meta: { adminOnly: true } },
    { path: '/categories/create', component: Create, name: 'categories.create', meta: { adminOnly: true } },
    { path: '/categories/edit/:id', component: Edit, name: 'categories.edit', meta: { adminOnly: true } },
]