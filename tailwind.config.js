import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import daisyui from 'daisyui';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js', // utile se usi JS con Tailwind
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, daisyui],

    // Opzioni DaisyUI, personalizzabili
    daisyui: {
        styled: true,
        themes: ['light', 'dark'],  // supporto light/dark mode
        base: true,
        utils: true,
        logs: true,
        rtl: false,
    },
};
