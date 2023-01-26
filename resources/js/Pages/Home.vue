<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { onMounted } from 'vue';
import ButtonMenu from '@/Components/ButtonMenu.vue';
import Jauge from '@/Components/Jauge.vue';

import { initAccordions, 
    initCarousels, 
    initCollapses, 
    initDials, 
    initDismisses, 
    initDrawers, 
    initDropdowns, 
    initModals, 
    initPopovers, 
    initTabs, 
    initTooltips} from 'flowbite';
import { purple, yellow } from 'tailwindcss/colors';

onMounted(() => {
    initAccordions();
    initCarousels();
    initCollapses();
    initDials();
    initDismisses();
    initDrawers();
    initDropdowns();
    initModals();
    initPopovers();
    initTabs();
    initTooltips();
});

defineProps({
    dataUser: Array,
});

let xp = 50;
let lien = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/1.png";
</script>

<!-- modal template: https://flowbite.com/docs/components/modal/#javascript-behaviour  -->
<template>
    <Head title="home" />


    <div class ="bg-[url('/img/bgnature.png')] w-full max-h-screen min-h-screen align-center justify-center bg-cover">
        <header class="flex flex-row w-full h-1/4 opacity-90 py-3">

            <div class="flex flex-row w-full items-center justify-evenly ">
                <Jauge :dataUser="dataUser.xp" :color="'blue'">Level:{{ dataUser.level}}</Jauge>
                <Jauge :dataUser="100" :color="'yellow'">Money: {{ dataUser.money}} $</Jauge>
                <Jauge :dataUser="(dataUser.box/dataUser.max_box)*100" :color="'purple'">Box: {{dataUser.box}}/{{ dataUser.max_box }}</Jauge>
            </div> 

            
            <div class="flex flex-row justify-end mr-3 mt-3">
                <Link :href="route('dashboard')" type="button" class="mr-3 text-sm bg-gray-800 
                    rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <img class="w-14 h-14 rounded-full" src="" alt="user photo">
                </Link>
            </div>

        </header>
        <main class="flex flex-row justify-evenly h-100vh w-full ">

            
                <nav class="flex flex-col gap-16 items-start font-unowm w-1/4 h-96">

                        <ButtonMenu :href="route('aventure.index')" >Adventure</ButtonMenu>
                        <ButtonMenu :href="route('bag')">Bag</ButtonMenu>
                        <ButtonMenu :href="route('team')">Team</ButtonMenu>
                        <ButtonMenu :href="route('box')">Box</ButtonMenu>
                </nav>

<!-- Profil user menu-->
                <!-- <div class="flex flex-row ml-7 "> -->
                    <img :src="`${ lien }`" alt="pokemon" class="align-center justify-center h-60
                ">
                <!-- </div> -->
                <nav class="flex flex-col pokemon items-end  w-1/4">

                    <Link href="#" class="text-white bg-gradient-to-r from-red-400 via-red-500 
                        to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none 
                        focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50
                        dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 
                        py-2.5 text-center mr-2 mb-2">
                        Event
                    </Link>

                    <Link href="#" class="text-white bg-gradient-to-r from-red-400 via-red-500
                        to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none
                        focus:ring-red-300 shadow-lg shadow-red-500/50 font-medium rounded-lg text-sm   
                        px-5 py-2.5 text-center mr-2 mb-2 pokemon">Event</Link>

                    <Link href="#" class="text-white bg-gradient-to-r from-red-400 via-red-500
                        to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none
                        focus:ring-red-300 shadow-lg shadow-red-500/50 font-medium rounded-lg text-sm
                        px-5 py-2.5 text-center mr-2 mb-2 myfont">Event</Link>
                </nav>
            
        </main>
    </div>

</template>
<style> 
@font-face {
   font-family: ketchum;
   src: url(../../css/font/Ketchum.otf);
   font-family: pokemon;
   src: url(../../css/font/pokemon.ttf);
   font-family: pokemonXY;
   src: url(../../css/font/pokemonXY.ttf)
}
*{
    font-family:pokemonXY;
    }
</style>