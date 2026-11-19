import { createApp } from "vue";
import App from "./App.vue";
import { router } from "./router/index.js";
import { auth } from './domains/auth/store.js';

const { fetchUser } = auth()

try {
    await fetchUser();
} catch {

} finally {
    const app = createApp(App);
    app.use(router)
    app.mount("#app");
}



