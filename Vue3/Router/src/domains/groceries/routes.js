import {createMemoryHistory, createRouter} from 'vue-router';

import OverView from './pages/Overview.vue';
import Create from './pages/Create.vue';
import Edit from './pages/Edit.vue';

const routes = [
    {path: '/', component: OverView},
    {path: '/edit', component: Edit},
    {path: '/create', component: Create},
];

export const router = createRouter({
    history: createMemoryHistory(),
    routes,
});
