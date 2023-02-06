<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { onMounted } from 'vue';
import ButtonMenu from '@/Components/ButtonMenu.vue';
import Header from '@/Layouts/Header.vue';

import {
    initCarousels, 
    initDropdowns, 
    initModals, 
   } from 'flowbite';

onMounted(() => {
    initCarousels();
    initDropdowns();
    initModals();
});

const props = defineProps({
    fav: Array,
});



</script>

<template>
    <Head title="home"/>
    <div class="w-screen h-screen text-red-500 bg-black landscape:hidden"> TOURNE L'ECRAN FIEU!
    </div>
    <div class="">
        <Header />
        <main class="flex flex-row justify-around h-4/5 w-full"></main>
    </div>


</template>
