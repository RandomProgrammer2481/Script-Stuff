import { createApp } from "vue";
import App from "./App.vue";
import { router } from "./router/index.js";

const app = createApp(App);
app.use(router)
app.mount("#app");



router.isReady().catch((err) => {
    console.error('router error:', err)
    console.error('cause:', err?.cause)
})
