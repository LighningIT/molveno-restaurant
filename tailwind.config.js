const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
<<<<<<< HEAD
=======
            colors: {
                molveno: {
                    lightestBlue: '#68b6da',
                    lightBlue: '#309bcf',
                    blue: '#0084c4',
                    darkBlue: '#006ead',
                    darkestBlue: '#005693'
                }
            },
            gridTemplateColumns: {
                reservation: "1fr 2fr 3fr .5fr"
            }
>>>>>>> 35ea66136599b4802383603f905b1a7c08a0b216
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
