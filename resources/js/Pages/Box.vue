<script setup> // for Ext API Aka Composition
import { Head, Link} from '@inertiajs/inertia-vue3';
import Header from '@/Layouts/Header.vue';
import ButtonMenu from '@/Components/ButtonMenu.vue';

const props = defineProps({
    listPokemon: Array,
});
console.log(props.listPokemon);
let nbSlot = props.listPokemon.length + (4 - (props.listPokemon.length%4));


</script>
<script>
export default {
    data() {
        return {
            pick: 0   
        }
    },
};
</script>

<template>

    <Head title="box" />


    
    <div class ="w-full max-h-screen min-h-screen h-screen">
        <Link :href="route('home')" class="m-5 w-20 h-40 hover:underline">Home</Link>
        <!-- <Header :dataUser="dataUser"/> -->
        <main class="flex flex-col items-center h-4/5 mx-10 bg-red-600 bg-opacity-30 rounded-2xl border-4">
            <h2 class="text-3xl flex">Box</h2>
            <div class="flex justify-evenly w-full h-4/5 mt-14">
                <nav>
                    <ButtonMenu>grid</ButtonMenu>
                    <ButtonMenu>filter</ButtonMenu>
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
                        <p class="inline-flex items-center text-xl font-semibold  text-white hover:underline">Type: {{listPokemon[pick].type }}</p>
                        <p class="inline-flex items-center text-xl first-letter:font-normal text-white hover:underline">Level: {{listPokemon[pick].level }}</p>
                        <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Exp.: {{listPokemon[pick].xp}}</p>
                        <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Hp: {{listPokemon[pick].hp}}</p>
                        <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Attack: {{listPokemon[pick].attack}}</p>
                        <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Defense: {{listPokemon[pick].defense}}</p>
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
