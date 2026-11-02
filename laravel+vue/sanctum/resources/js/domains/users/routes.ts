import Login from "./pages/Login.vue";
import Me from "./pages/Me.vue";

export const userRoutes = [ 
    { path: '/login', component: Login, name: 'users.login' },
    { path: '/me', component: Me, name: 'users.me'}
]