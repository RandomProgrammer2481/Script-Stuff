import { RouteLocation, RouteLocationNormalized} from "vue-router";
import Create from "./pages/Create.vue";
import Edit from "./pages/Edit.vue";
import Index from "./pages/Index.vue";
import Show from "./pages/Show.vue";
import { ticketStore } from "./store.js";



export const ticketRoutes = [
    { path: '/tickets', component: Index, name: 'tickets.index'},
    { path: '/tickets/create', component: Create, name: 'tickets.create'},
    { path: '/ticket/:id', component: Show, name: 'tickets.show',
        meta: {ownerOnly: (to: RouteLocationNormalized) => ticketStore.getters.getById(Number(to.params.id))?.value?.creator?.id,}},
    { path: '/tickets/:id/edit', component: Edit, name: 'tickets.edit', 
        meta: {ownerOnly: (to: RouteLocationNormalized) => ticketStore.getters.getById(Number(to.params.id))?.value?.creator?.id,}},
    { path: '/', redirect: { name: 'tickets.index' }}
]