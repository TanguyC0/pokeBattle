<script setup> // for Ext API Aka Composition
import { Head, Link} from '@inertiajs/inertia-vue3';

const props = defineProps({
    listPokemon: Array,
});

let nbSlot = props.listPokemon.length + (4 - (props.listPokemon.length%4));
let pick = 0;
// let grid = 'grid-cols-4 gap-4';
// let list = 'grid-cols-1 gap-1';
let name= props.listPokemon[pick].name;
let type=  props.listPokemon[pick].type;
let level = props.listPokemon[pick].level;
let hp =  props.listPokemon[pick].hp;
let xp = (props.listPokemon[pick].xp / props.listPokemon[pick].xpMax);
let attack = props.listPokemon[pick].attack;
let defense = props.listPokemon[pick].defense ; 
</script>
<script>
export default {
    data() {
        return {
            pick: 0,     
        }
    },

    // data:() => ({
    //     searchQuery:"data",
    //     data: [
    //         name, type, level, hp, xp, attack, defense
    //     ]

    // }),

    // methods: {
    //     toggleGrid () {
    //     this.grid= this.grid === 'grid-cols4 gap-4' ? 'grid-cols-1 gap-1' : 'grid-cols4 gap-4'
    // }
//}
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
                        <li :style="{}" class="m-1 w-full h-full  bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-200" @click="pick = n-1">
                            <img v-if="n<=listPokemon.length" :src="`${listPokemon[n-1].image}`" alt="item" class="w-full justify-center">
                            
                            <!-- <button @click="pick = n-1">click</button> -->
                        </li>
                    </template>
                </ul>
            </section>
            <section class="grid grid-cols-1 border rounded-lg shadow-lg bg-gray-600 border-gray-700 hover:bg-gray-700  ml-5 w-2/3 h-full
            ">
                <h3 class="text-center text-white font-unown">Detail</h3>        
                <p class="inline-flex items-center text-xl font-ketchum font-semibold  text-white hover:underline">Type: {{ type }}</p>
                <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Level: {{ level }}</p>
                <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Exp.: {{ xp }}</p>
                <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Hp: {{hp }}</p>
                <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Attack: {{ attack }}</p>
                <p class="inline-flex items-center text-xl font-normal text-white hover:underline">Defense: {{ defense}}</p>
            </section>
        </div>
    </main>
</template>
