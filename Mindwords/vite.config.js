import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'musical-space-guacamole-97wp5gwjxx6q2xv5w-5173.app.github.dev',
        },
        watch: {
            usePolling: true,
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/auth.css',
                'resources/js/app.js',
                'resources/js/auth.js',
            ],
            refresh: true,
        }),
    ],
});
