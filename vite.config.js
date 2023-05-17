import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/login.css',
                'resources/css/groupedTableManagement.css',
                'resources/js/groupedTableManagement.js',
                'resources/js/app.js',
                'resources/js/createNewReservation.js',
                'resources/js/checkInReservation.js',
                'resources/js/updateTableStatus.js',
                'resources/js/loginPasswordField.js',
                'resources/js/confirmDelete.js',
                'resources/js/alterUsers.js',
                'resources/js/succesMessage.js'
            ],
            refresh: true,
        }),
    ],
});
