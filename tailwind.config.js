import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: [ 'Figtree', ...defaultTheme.fontFamily.sans ],
            },
        },
    },

    plugins: [ forms ],
};

// tailwind.config.js
module.exports = {
    content: [
        './src/**/*.{js,jsx,ts,tsx,html}', // Sesuaikan path sesuai proyek Anda
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require( '@tailwindcss/forms' ), // Pastikan plugin ini sudah ditambahkan
    ],
}
