import Overview from './pages/Overview.vue';
import Edit from './pages/Edit.vue';
import Create from './pages/Create.vue';
import Order from './pages/Order.vue';

export const routes = [
    {path: '/', component: Overview, name: 'inventory.overview'},
    {path: '/Edit/:ID', component: Edit, name: 'inventory.edit'},
    {path: '/Create', component: Create, name: 'inventory.create'},
    {path: '/Order', component: Order, name: 'inventory.order'},
];
