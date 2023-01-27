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
            ketchum: ["Ketchum"],
            pokemon: ["pokemon",...defaultTheme.fontFamily.sans,],
            
            unown: ["unown"],
            pokemonXY: ["PokemonXY"],
        },
        screens: {
            sm: "480px",
            md: "768px",
            lg: "976px",
            xl: "1440px",
        },
    },

    plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
}
};
