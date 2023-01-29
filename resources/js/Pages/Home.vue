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
let lien = `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${Math.floor(Math.random() * 500)+1}.png`;
</script>

<template>
    <Head title="home"/>


    <div class ="w-full max-h-screen min-h-screen h-screen">
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

                </nav>
            
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