import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import ChatForm from "./components/ChatForm.vue";
import ChatMessages from "./components/ChatMessages.vue";

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({methods: {route: window.route}})
            .mount(el)
    },
})

const app = createApp({
    components: {
        ChatForm,
        ChatMessages
    }
});
app.mount('#app');
