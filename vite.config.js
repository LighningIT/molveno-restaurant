import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/createNewReservation.js',
                'resources/js/checkInReservation.js',
                'resources/js/updateTableStatus.js',
                'resources/js/loginPasswordField.js',
                'resources/js/confirmDelete.js',
                'resources/js/groupedTableManagement.js',
                'resources/js/groupedTableManagement.css',
            ],
            refresh: true,
        }),
    ],
});
