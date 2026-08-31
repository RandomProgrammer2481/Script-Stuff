import OverView from './pages/Overview.vue';
import Create from './pages/Create.vue';
import Edit from './pages/Edit.vue';

export const routes = [
    {path: '/', component: OverView},
    {path: '/edit', component: Edit},
    {path: '/create', component: Create},
];
