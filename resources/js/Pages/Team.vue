<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import ButtonMenu from '@/Components/ButtonMenu.vue';
import Header from '@/Layouts/Header.vue';
import axios from 'axios';
import { ref } from 'vue';

const props = defineProps({
    listPokemon: Array,
    team: Array,
    bag: Array,
});

const pickTeam = ref(0);
const pick = ref(0);
const display = ref('pokemon');
let nbSlot = props.listPokemon.length;
let nbSlotBag = props.bag.length;

function switchPokemon(place, pokemon, team){
    
    console.log(team);
    // Vérifier que la liste `team` n'est pas vide et que l'objet avec la propriété `idTable` égale à `pokemon` 
    // n'existe pas déjà dans la liste `team`
    if(team.length <= 0 && team.find(poke => poke.idTable === pokemon) != null) exit();

    // Si un objet existe, envoyer une requête POST à l'API
    axios.post('/api/updateTeam', {
        place: place,
        pokemon: pokemon
    })
    
}

function used(pokemon, team, place){

    if (pick.value == place){
        return "bg-violet-300";
    }
    if(team.length > 0){
        let existingPokemon = team.find(poke => poke.idTable === pokemon);
        if(existingPokemon != null){
            return "bg-red-500";
        }
    }
    return "";
}

</script>

<template>
    <Head title="team" />
    <div class ="w-full max-h-screen min-h-screen h-screen">
        <Header />
        <main class="flex flex-col items-center h-4/5 mx-10 bg-red-600 bg-opacity-30 rounded-2xl border-4">
            <h2 class="text-3xl flex">Team</h2>
            <div class="flex justify-evenly w-full h-4/5 mt-14">
                <section class="border p-8 rounded-lg">
                    <h3 class="text-center text-3xl mb-8">Your team</h3>
                    <ul class="grid grid-cols-3 gap-4 wrap ">
                        <template v-for="n in 6">
                            <li @click="pickTeam = n-1" class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "
                                :class="{'bg-violet-300': pickTeam==n-1}" >
                                <img v-if="n<=team.length" :src="`${team[n-1].image}`" alt="item" class="w-full justify-center">
                            </li>
                        </template>
                    </ul>
                </section>
                <section class="border p-8 rounded-lg overflow-y-scroll">
                    {{ display }}
                    <ul class="grid grid-cols-4 gap-4 wrap ">
                        <template v-if="display == 'pokemon'" v-for="n in nbSlot">
                            <li @click="pick = n-1" class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "
                            :class="used(listPokemon[n-1].idTable,team,n-1)">
                                <img v-if="n<=listPokemon.length" :src="`${listPokemon[n-1].image}`" alt="item" class="w-full justify-center">
                            </li>
                        </template>
                        <template v-if="display == 'item'" v-for="n in nbSlotBag">
                            <li @click="pick = n-1" class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "
                            :class="used(listPokemon[n-1].idTable,team,n-1)">
                                <img v-if="n<=listPokemon.length" :src="`img/items/item${bag[n-1].id_item}.png`" alt="item" class="w-full justify-center">
                            </li>
                        </template>
                    </ul>
                </section>
                <nav>
                    <ButtonMenu @click="display = 'pokemon'">pokemon</ButtonMenu>
                    <ButtonMenu @click="display = 'item'">item</ButtonMenu>
                    <ButtonMenu v-if="display == 'pokemon'" @click="switchPokemon(pickTeam,listPokemon[pick].idTable,team)">take in team</ButtonMenu>
                    <ButtonMenu v-if="display == 'item'">use</ButtonMenu>
                </nav>
            </div>
        </main>
    </div>
</template>
