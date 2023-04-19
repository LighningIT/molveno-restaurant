import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
<<<<<<< HEAD
=======
                'resources/js/createNewReservation.js',
                'resources/js/checkInReservation.js',
                'resources/js/updateTableStatus.js',
                'resources/js/loginPasswordField.js',
                'resources/js/confirmDelete.js'
>>>>>>> 35ea66136599b4802383603f905b1a7c08a0b216
            ],
            refresh: true,
        }),
    ],
});
