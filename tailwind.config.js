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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                roboto: ['Roboto', 'sans-serif'],
            },
            colors: {
                'amazon-orange': '#febd69',
                'amazon-dark': '#131921',
                'amazon-navy': '#232f3e',
                'amazon-blue': '#007185',
                'amazon-button': '#ffd814',
            }
        },
    },

    plugins: [forms],
};
