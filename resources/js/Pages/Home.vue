<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { onMounted } from 'vue';
import ButtonMenu from '@/Components/ButtonMenu.vue';
import Header from '@/Layouts/Header.vue';

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
    <Head title="home"/>


    <div class ="w-full max-h-screen min-h-screen h-screen align-center justify-center bg-cover">
        <Header :dataUser="dataUser"/>
        <main class="flex flex-row justify-around h-4/5 w-full ">

            
                <nav class="flex flex-col gap-6 items-start font-unowm w-1/4 h-full">

                        <ButtonMenu :href="route('aventure.index')" >Adventure</ButtonMenu>
                        <ButtonMenu :href="route('bag')">Bag</ButtonMenu>
                        <ButtonMenu :href="route('team')">Team</ButtonMenu>
                        <ButtonMenu :href="route('box')">Box</ButtonMenu>
                </nav>

<!-- Profil user menu-->
                <!-- <div class="flex flex-row ml-7 "> -->
                    <img :src="`${ lien }`" alt="pokemon" class="align-center justify-center h-96 mt-24">
                <!-- </div> -->
                <nav class="flex flex-col gap-12 items-end font-unowm w-1/4 h-full">

                    <ButtonMenu :href="'#'">Event 1</ButtonMenu>
                    <ButtonMenu :href="'#'">Event 2</ButtonMenu>
                    <ButtonMenu :href="'#'">Event 3</ButtonMenu>

                    <!-- <Link href="#" class="text-white bg-gradient-to-r from-red-400 via-red-500 
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
                        px-5 py-2.5 text-center mr-2 mb-2 myfont">Event</Link> -->
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