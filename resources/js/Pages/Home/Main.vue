<script setup>
import { Head} from '@inertiajs/inertia-vue3';
import { onMounted,ref } from 'vue';
import LinkButton from '@/Components/Buttons/LinkButton.vue';
import NormalButton from '@/Components/Buttons/NormalButton.vue';
import Header from '@/Layouts/Header.vue';
import Bag from '@/Pages/Home/Partials/Bag.vue';
import Team from '@/Pages/Home/Partials/Team.vue';
import Box from '@/Pages/Home/Partials/Box.vue';

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

const props = defineProps({
    fav: Number,
});

const open = ref('home');
const imgfav = ref("");


const close = () => {
    open.value = 'home';
}

function setFav(fav) {
    imgfav.value = fav != 0?`https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${fav}.png`:'../img/PokeGhost.png';
}
const update = () => {
    // console.log(imgfav.value);
    imgfav.value = imgfav.value;
}
setFav(props.fav);

onMounted(() => {
  setInterval(() => {
    update();
  }, 1000);
});
</script>

<template>
    <Head title="home"/>
    <div class ="w-full max-h-screen min-h-screen h-screen">
            <Header />
            <main class="h-4/5 w-full relative">

                <section class="flex flex-row justify-around items-center h-full w-full absolute">
                    <nav class="flex flex-col gap-6 items-start font-unowm w-1/4 h-full">
                        <LinkButton :href="route('aventure.index')">Adventure</LinkButton>
                        <NormalButton @click="open = 'bag'">Bag</NormalButton>
                        <NormalButton @click="open = 'team'">Team</NormalButton>
                        <NormalButton @click="open = 'box'">Box</NormalButton>
                    </nav>

                    <img :src="imgfav" alt="pokemon" class="h-96">

                    <nav class="flex flex-col gap-12 items-end font-unowm w-1/4 h-full">
                        <NormalButton :href="'#'" :color="'red'">Event 1</NormalButton>
                        <NormalButton :href="'#'" :color="'slate'">Event 2</NormalButton>
                        <NormalButton :href="'#'" :color="'slate'">Event 3</NormalButton>
                    </nav>
                </section>

                <Bag v-if="open == 'bag'" :open="close"></Bag>
                <Team v-if="open == 'team'" :open="close" :setFav="setFav"></Team>
                <Box v-if="open == 'box'" :open="close"></Box>
                
            </main>
    </div>

</template>