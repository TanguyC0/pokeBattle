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
</script>

<!--
lvl : 22/100
xp 19/123

(19/123) *100 => %

-->


<!-- modal template: https://flowbite.com/docs/components/modal/#javascript-behaviour  -->
<template>
<Head title="home" />

    <header class="flex flex-row w-full mt-3">
        <div class="flex flex-row w-full items-center justify-evenly">
                <div class="w-1/4 h-12  rounded-full  bg-gray-200  dark:bg-gray-700 ">
                    <div class="h-12 align-top bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br 800 text-xs font-medium text-blue-100 text-center text- p-0.5 leading-none rounded-full" :style="`width: ${dataUser.xp}%`"> Level:{{ dataUser.level}}/100 </div>
                </div>
                
                <div class="w-1/4 h-12 rounded-full bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br text-xs font-medium text-blue-100 text-center p-0.5 leading-none"> {{ dataUser.money}} $ </div> 
                
                <div class="w-1/4 h-12  bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="h-12 bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" :style="`width: ${(dataUser.box/dataUser.max_box)*100}%`"> Box:{{dataUser.box}}/{{ dataUser.max_box }} </div>
                </div>
        </div>
        <div class="flex flex-row justify-end mr-3 mt-3">
        <Link :href="route('register')" type="button" class="mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <img class="w-14 h-14 rounded-full" src="" alt="user photo">
        </Link>
        </div>
    </header>
    <body class =" bg-[ url('/img/bee9421ef67cb866e78dc04e3a507746.jpg')]align-center justify-cente">
    <main class="flex flex-col ">
    <div class="flex flex-row w-full h-100vh border rounded-lg bg-slate-300 opacity-45 m-10 p-10">
        <nav class="flex flex-col font-unown items-center ml-3 w-1/4 h-100vh">
            
                    <div class="flex flex-col items-start md:order-2 h-100vh  mt-5 ">
                        <Link :href="route('home')" class=" mt-5w-20 h-10  text-white bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 dark:shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Home</Link>
                        <Link :href="route('aventure.index')" class=" mt-5 text-white bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 dark:shadow-lg font-medium  rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Adventure</Link>
                        <Link :href="route('bag')" class="text-white  w-20 h-10 bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 dark:shadow-lg font-medium rounded-lg text-sm px-5 mt-5 py-2.5 text-center mr-2 mb-2">Bag</Link>
                        <Link :href="route('team')" class="text-white w-20 h-10 bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 dark:shadow-lg font-medium rounded-lg text-sm px-5 mt-5 py-2.5 text-center mr-2 mb-2">Team</Link>
                        <Link :href="route('box')" class="text-white w-20 h-10 bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 dark:shadow-lg font-medium  rounded-lg text-sm px-5 mt-5 py-2.5 text-center mr-2 mb-2">Box</Link>
                </div>
        </nav>
        <div class="flex flex-row w-full h-full p-2 m-2 ml-7 justify-center object-contain">
            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/1.png" alt="pokemon" class="align-center justify-center object-scale-down p-10  bg-white rounded shadow-md ">
            <p>{{ namePokemon }}</p>
        </div>
        <!-- <div class="flex flex-col font-ketchum items-end mr-3 w-1/4 h-100vh">
            <Link :href="route('event1')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Event</Link>
            <Link :href="route('event2')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Event</Link>
            <Link :href="route('event3')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Event</Link>

        </div> -->
    </div>
</main>
</body>
</template>
