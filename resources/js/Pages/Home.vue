<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { onMounted } from 'vue';

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
    <Head title="home" />


    <div class ="bg-[url('/img/bgnature.png')] w-full max-h-screen min-h-screen align-center justify-center bg-cover">
        <header class="flex flex-row w-full h-1/4 opacity-90 py-3">

            <div class="flex flex-row w-full items-center justify-evenly ">
                <div class="w-1/4 h-12 relative border bg-gray-200 rounded">
                    <div class="absolute w-full text-center p-3 h-12 z-10 font-xl text-black">
                        Level:{{ dataUser.level}}
                    </div>
                    <div class=" absolute h-12 bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400   
                        rounded-l p-0.5" :style="`width: ${dataUser.xp}%`">
                    </div>
                </div>

                <div class="w-1/4 h-12 relative bg-gray-200 rounded-lg">
                    <div class="money absolute w-full text-center p-3 h-12 z-10 font-xl text-black">
                        Money: {{ dataUser.money}} $ 
                    </div>
                    <div class=" absolute h-12 bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 
                        rounded-lg p-0.5 shadow-lg" :style="`width: ${100}%`">
                    </div>
                </div>

                <div class="border-2 border-purple-500 w-1/4 h-12 relative bg-gray-200 rounded">
                    <div class="absolute w-full text-center p-3 h-12 z-10 font-xl text-black">
                        Box: {{dataUser.box}}/{{ dataUser.max_box }} 
                    </div>
                    <div class="absolute h-11 bg-gradient-to-r from-purple-200 via-purple-300 to-purple-400 
                        rounded-l p-0.5" :style="`width: ${(dataUser.box/dataUser.max_box)*100}%`">
                    </div>
                </div>
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

            
                <nav class="flex flex-col gap-16 items-start font-pokemon w-1/4 h-96">

                        <Link :href="route('aventure.index')" class="  text-white bg-gradient-to-r
                        from-blue-200 via-blue-300 to-blue-400 hover:bg-gradient-to-br focus:ring-4 
                        focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 rounded-lg 
                        text-sm px-5 py-2.5 text-center  border-2">Adventure</Link>

                        <Link :href="route('bag')" class="text-white  w-20 h-10 bg-gradient-to-r
                        from-blue-200 via-blue-300 to-blue-400 hover:bg-gradient-to-br focus:ring-4
                        focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 rounded-lg
                        text-sm px-5  py-2.5 text-center ">Bag</Link>

                        <Link :href="route('team')" class="text-white w-20 h-10 bg-gradient-to-r
                        from-blue-200 via-blue-300 to-blue-400 hover:bg-gradient-to-br focus:ring-4
                        focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 rounded-lg
                        text-sm px-5  py-2.5 text-center ">Team</Link>

                        <Link :href="route('box')" class="text-white w-20 h-10 bg-gradient-to-r
                        from-blue-200 via-blue-300 to-blue-400 hover:bg-gradient-to-br focus:ring-4
                        focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50
                        rounded-lg text-sm px-5  py-2.5 text-center ">Box</Link>
                </nav>

<!-- Profil user menu-->
                <!-- <div class="flex flex-row ml-7 "> -->
                    <img :src="`${ lien }`" alt="pokemon" class="align-center justify-center h-60
                ">
                <!-- </div> -->
                <div class="flex flex-col font-pokemon items-end  w-1/4">

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
                </div>
            
        </main>
    </div>

</template>
<!-- <style> 
@font-face {
   font-family: ketchum;
   src: url(../../css/font/Ketchum.otf);
   font-family: pokemon;
   src: url(../../css/font/pokemon.ttf);
   font-family: pokemonXY;
   src: url(../../css/font/pokemonXY.ttf)
}
*{
    font-family:pokemon;
    }
</style> -->