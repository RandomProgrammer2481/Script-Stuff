import Error401 from "./pages/Error401.vue";
import Error404 from "./pages/Error404.vue";

export const errorRoutes =[
    { path: '/401', component: Error401, name: 'errors.401', meta: { public: true } },
    { path: '/404', component: Error404, name: 'errors.404', meta: { public: true } },
]
