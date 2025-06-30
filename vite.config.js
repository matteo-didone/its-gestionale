import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: 'localhost',
        port: 5173,
        strictPort: true,
        hmr: {
            host: 'localhost',  // importantissimo per hmr (live reload)
            protocol: 'ws',     // websocket protocol
            port: 5173,
        },
    },
});
