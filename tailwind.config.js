import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './app/Livewire/**/*.php',
      './vendor/wire-elements/modal/*.blade.php',
      './storage/framework/views/*.php',
      './resources/views/**/*.blade.php',
    ],
    options: {
        safelist: [
            "max-w-sm",
            "max-w-md",
            "max-w-lg",
            "max-w-xl",
            "max-w-2xl",
            "max-w-3xl",
            "max-w-4xl",
            "max-w-5xl",
            "max-w-6xl",
            "max-w-7xl"
        ]
    },
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    screens: {
        'sm': '640px',
        // => @media (min-width: 640px) { ... }

        'md': '768px',
        // => @media (min-width: 768px) { ... }

        'lg': '1024px',
        // => @media (min-width: 1024px) { ... }

        'xl': '1280px',
        // => @media (min-width: 1280px) { ... }

        '2xl': '1536px',
        // => @media (min-width: 1536px) { ... }
      },

    plugins: [forms],
};
