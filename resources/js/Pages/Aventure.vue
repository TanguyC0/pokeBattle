<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    // dataUser: Array,
    // message: String,
});
</script>


<!-- modal template: https://flowbite.com/docs/components/modal/#javascript-behaviour  -->
<template>
<Head title="aventure" />
    <!-- <header class="flex flex-row w-full mt-3">
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
        <button type="button" class="mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <img class="w-14 h-14 rounded-full" src="" alt="user photo">
        </button>
        </div>
    </header> -->


    <div class="flex flex-row w-full h-100vh">
        <nav class="flex flex-col font-unown items-center ml-3 w-1/4 h-100vh">
            
                    <div class="flex flex-col items-start md:order-2 h-100vh  mt-5 ">
                        <Link :href="route('home')" class=" mt-5 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Home</Link>
                        <Link :href="route('aventure.index')" class=" mt-5 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Adventure</Link>
                        <Link :href="route('bag')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Bag</Link>
                        <Link :href="route('team')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Team</Link>
                        <Link :href="route('box')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Box</Link>
                </div>
        </nav>

        <!-- <Link :href="route('aventure.walk')" class=" mt-5 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">walk</Link> -->
        <!-- <p>{{ message }}</p> -->

        <!-- <div class="flex flex-col font-ketchum items-end mr-3 w-1/4 h-100vh">
            <Link :href="route('event1')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Event</Link>
            <Link :href="route('event2')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Event</Link>
            <Link :href="route('event3')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Event</Link>

        </div> -->
    </div>

</template>
