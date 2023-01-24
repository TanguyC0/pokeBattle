<script setup> // for Ext API Aka Composition
import { Head, Link} from '@inertiajs/inertia-vue3';

const props = defineProps({
    listPokemon: Array,
});
console.log(props.listPokemon);
let nbSlot = props.listPokemon.length + (4 - (props.listPokemon.length%4));
// let pick = 0;
// let grid = 'grid-cols-4 gap-4';
// let list = 'grid-cols-1 gap-1';


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


    <Link :href="route('home')" class="m-5 w-20 h-40 hover:underline">Home</Link>
    
    <main class="m-10 p-10 bg-slate-300 flex flex-col border rounded-lg">
        <h2 class="text-3xl p-3">Bag</h2>
        <div class="flex place-items-center">
            <section>
                <nav>
                    <button class="mr-2 w-20 h-10 bg-blue-200 text-center border rounded-lg" @click="toggleGrid">Grid</button>
                    <button class="ml-2 w-20 h-10 bg-blue-200 text-center border rounded-lg">Filter</button>
                </nav>
                <ul class="grid grid-cols-4 gap-4 wrap bg-slate-300 w-full h-full">
                    <template v-for="n in nbSlot">
                        <li class="m-1 w-full h-full  bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-200" @click=" pick= n-1">
                            <img v-if="n<=listPokemon.length" :src="`${listPokemon[n-1].image}`" alt="item" class="w-full justify-center">
                            
                        </li>
                    </template>
                </ul>
            </section>
            <section class="grid grid-cols-1 border rounded-lg shadow-lg bg-gray-600 border-gray-700 hover:bg-gray-700  ml-5 w-2/3 h-full
            ">
                <h3 class="text-center text-white font-unown">Detail</h3>
                <template v-if="listPokemon.length > 0">
                    <p class="inline-flex items-center text-xl font-ketchum font-semibold  text-white hover:underline">Type: {{listPokemon[pick].type }}</p>
                    <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Level: {{listPokemon[pick].level }}</p>
                    <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Exp.: {{listPokemon[pick].xp}}</p>
                    <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Hp: {{listPokemon[pick].hp}}</p>
                    <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Attack: {{listPokemon[pick].attack}}</p>
                    <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Defense: {{listPokemon[pick].defense}}</p>
                </template>
            </section>
        </div>
    </main>
</template>
