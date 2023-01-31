<script setup> // for Ext API Aka Composition
import { Head, Link} from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import Header from '@/Layouts/Header.vue';
import ButtonMenu from '@/Components/ButtonMenu.vue';
import axios from 'axios';

const props = defineProps({
    listPokemon: Array,
});

const pick = ref(0);

let nbSlot = props.listPokemon.length + (4 - (props.listPokemon.length%4));

function chooseFavorite(poke){

    axios.post('/api/favorite', {
        id: poke.id
    }).then(response => {
console.log(response.data);
});

}

</script>

<template>

    <Head title="box" />


    
    <div class ="w-full max-h-screen min-h-screen h-screen">
        <Header/>
        <main class="flex flex-col items-center h-4/5 mx-10 bg-red-600 bg-opacity-30 rounded-2xl border-4">
            <h2 class="text-3xl flex">Box</h2>
            <div class="flex justify-evenly w-full h-4/5 mt-14">
                <nav>
                    <ButtonMenu>grid</ButtonMenu>
                    <ButtonMenu>filter</ButtonMenu>
                    <ButtonMenu @click="chooseFavorite(listPokemon[pick])" >fav</ButtonMenu>
                    <ButtonMenu>sell</ButtonMenu>
                </nav>
                <section class="border p-8 rounded-lg overflow-y-scroll">
                    <ul class="grid grid-cols-4 gap-4 wrap ">
                        <template v-for="n in nbSlot">
                            <li class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "
                                @click="pick= n-1" @mouseover="" >
                                <img v-if="n<=listPokemon.length" :src="`${listPokemon[n-1].image}`" alt="item" class="w-full justify-center">
                            </li>
                        </template>
                    </ul>
                </section>
                <section class="rounded-lg bg-white text-red-500 w-2/6 p-8 h-full">
                    <h3 class="text-center">Detail</h3>
                    <template v-if="listPokemon.length > 0">
                        <p class=" items-center text-xl  hover:underline">Type: {{listPokemon[pick].type }}</p>
                        <p class=" items-center text-xl  hover:underline">Level: {{listPokemon[pick].level }}</p>
                        <p class=" items-center text-xl  hover:underline">Exp.: {{listPokemon[pick].xp}}</p>
                        <p class=" items-center text-xl   hover:underline">Hp: {{listPokemon[pick].hp}}</p>
                        <p class=" items-center text-xl   hover:underline">Attack: {{listPokemon[pick].attack}}</p>
                        <p class=" items-center text-xl hover:underline">Defense: {{listPokemon[pick].defense}}</p>
                    </template>
                </section>
            </div>
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
