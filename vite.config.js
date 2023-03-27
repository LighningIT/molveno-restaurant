import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/login.css',
                'resources/js/groupedTableManagement.css',
                'resources/js/app.js',
                'resources/js/createNewReservation.js',
                'resources/js/updateTableStatus.js',
            ],
            refresh: true,
        }),
    ],
});
