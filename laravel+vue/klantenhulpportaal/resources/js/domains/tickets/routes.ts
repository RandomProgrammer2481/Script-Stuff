import Index from "./pages/Index.vue";

export const ticketRoutes = [
    { path: '/tickets', component: Index, name: 'tickets.index'},
    { path: '/', redirect: { name: 'tickets.index' }}
]