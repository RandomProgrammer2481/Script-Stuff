import ForgotPassword from "./pages/ForgotPassword.vue";
import ResetPassword from "./pages/ResetPassword.vue";

export const userRoutes = [
    { path:'/forgot-password', component: ForgotPassword, name:"password.forgot", meta: { public: true } },
    { path:'/reset-password/:token', component: ResetPassword, name:"password.reset", meta: { public: true } },
]