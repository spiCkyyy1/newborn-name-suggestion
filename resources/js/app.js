import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { config } from '@inertiajs/vue3'
createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
    defaults: {
        form: {
            recentlySuccessfulDuration: 5000,
        },
        prefetch: {
            cacheFor: '1m',
            hoverDelay: 150,
        },
        visitOptions: (href, options) => {
            return {
                headers: {
                    ...options.headers,
                    'X-Custom-Header': 'value',
                },
            }
        },
    },
})
// Set multiple values at once...
config.set({
    'form.recentlySuccessfulDuration': 1000,
    'prefetch.cacheFor': '5m',
})
