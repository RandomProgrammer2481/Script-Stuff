import {RouteLocationNormalized} from "vue-router";
import Create from "./pages/Create.vue";
import Edit from "./pages/Edit.vue";
import Index from "./pages/Index.vue";
import Show from "./pages/Show.vue";
import { ticketStore } from "./store.js";

const ticketOwnerId = async (to: RouteLocationNormalized) => {
    const id = Number(to.params.id)
    let ticket = ticketStore.getters.getById(id).value

    if (!ticket) {
        await ticketStore.actions.fetchAll()   // or a fetchById(id) if you add one
        ticket = ticketStore.getters.getById(id).value
    }

    return ticket?.creator?.id
}


export const ticketRoutes = [
    { path: '/tickets', component: Index, name: 'tickets.index'},
    { path: '/tickets/create', component: Create, name: 'tickets.create'},
    { path: '/tickets/:id', component: Show, name: 'tickets.show', meta: {ownerOnly: ticketOwnerId}},
    { path: '/tickets/:id/edit', component: Edit, name: 'tickets.edit', meta: {ownerOnly: ticketOwnerId}},
    { path: '/', redirect: { name: 'tickets.index' }}
]