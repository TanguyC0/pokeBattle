const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend:{
            fontFamily: {
                ketchum: ["Ketchum",'sans-serif'],
                pokemon: ["pokemon",'sans-serif'],
                unown: ["unown",'sans-serif'],
                pokemonXY: ["PokemonXY",'sans-serif'],
            },
            screens: {
                'tall': {
                    'raw': `only screen and (max-height: 960px) and (max-width: 480px)`
                },
                'wide': {
                    'raw': `only screen and (max-height: 480px) and (max-width: 960px)`
                },
                'portrait': {
                    'raw': '(orientation: portrait)'
                },
                'landscape': {
                    'raw': '(orientation: landscape)'
                }
            }
        },
        plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
    },
};
