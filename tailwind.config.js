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
        extend: {
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
                },
                'md': {'min': '360px', 'max': '640px'},
            }
        },
        plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
    },
    plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
}


// fontFamily: {
//     ketchum: ["Ketchum"],
//     pokemon: ["pokemon",...defaultTheme.fontFamily.sans,],
//     unown: ["unown"],
//     pokemonXY: ["PokemonXY"],
// },