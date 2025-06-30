import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './app/Livewire/**/*.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        require('daisyui')
    ],

    // Configurazione DaisyUI
    daisyui: {
        themes: [
            "light",
            "dark",
            {
                its: {
                    "primary": "#3b82f6",
                    "secondary": "#8b5cf6",
                    "accent": "#06b6d4",
                    "neutral": "#374151",
                    "base-100": "#ffffff",
                    "base-200": "#f9fafb",
                    "base-300": "#f3f4f6",
                    "info": "#0ea5e9",
                    "success": "#22c55e",
                    "warning": "#f59e0b",
                    "error": "#ef4444",
                },
            },
        ],
        darkTheme: "dark",
        base: true,
        styled: true,
        utils: true,
        logs: true,
        rtl: false,
    },
};