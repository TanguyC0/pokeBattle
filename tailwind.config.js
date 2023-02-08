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
                'portrait': {
                    'raw': '(orientation: portrait)'
                },
                'landscape': {
                    'raw': '(orientation: landscape)'
                },
            },
            fontFamily: {
                ketchum: ["Ketchum"],
                pokemon: ["pokemon",...defaultTheme.fontFamily.sans,],
                unown: ["unown"],
                pokemonXY: ["PokemonXY"],
        },
    },
    plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
},
}
