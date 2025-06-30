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
        host: '0.0.0.0', // Importante: permette connessioni da qualsiasi IP
        port: 5173,
        strictPort: true,
        hmr: {
            host: 'localhost', // Per il browser
            protocol: 'ws',
            port: 5173,
        },
        cors: true,
        watch: {
            usePolling: true, // Necessario per Docker
        },
    },
    build: {
        outDir: 'public/build',
        emptyOutDir: true,
        manifest: true,
        rollupOptions: {
            input: ['resources/css/app.css', 'resources/js/app.js'],
        },
    },
});