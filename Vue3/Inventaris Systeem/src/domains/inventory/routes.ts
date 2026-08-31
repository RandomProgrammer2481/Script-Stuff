import Overview from './pages/Overview.vue';
import Edit from './pages/Edit.vue';
import Create from './pages/Create.vue';
import Order from './pages/Order.vue';

export const routes = [
    {path: '/', component: Overview},
    {path: '/Edit/:id', component: Edit},
    {path: '/Create', component: Create},
    {path: '/Order', component: Order},
];
