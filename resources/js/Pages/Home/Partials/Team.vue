<script setup>
import { ref, onMounted } from 'vue';
import NormalButton from '@/Components/Buttons/NormalButton.vue';
import MainModal from '@/Components/Modals/MainModal.vue';
import axios from 'axios';

const props = defineProps(['open']);

const pick = ref(0);
const pickTeam = ref(0);
const display = ref('pokemon');
const pokemon = ref([]);
const bag = ref([]);
const team = ref([]);
const nbSlotP = ref(0);
const nbSlotB = ref(0);



function addTeam(){
    
    // Vérifier que la liste `team` n'est pas vide et que l'objet avec la propriété `idTable` égale à `pokemon` 
    // n'existe pas déjà dans la liste `team`
    if(team.value.length <= 0 && team.value.find(poke => poke.idTable === pokemon.value[pick.value].idTable) != null) exit();

    team.value[pickTeam.value] = pokemon.value[pick.value];
    // Si un objet existe, envoyer une requête POST à l'API
    axios.post('/api/updateTeam', {
        place: pickTeam.value,
        pokemon: pokemon.value[pick.value].idTable
    })
    
}

function useItem() {

    // Vérifier que la liste `bag` n'est pas vide et que l'objet avec la propriété `idTable` égale à `bag` 
    // n'existe pas déjà dans la liste `bag`
    if(bag.value.length <= 0 ) exit();

    // Si un objet existe, envoyer une requête POST à l'API
    axios.post('/api/item/useItem', {
        idItem : bag.value[pick.value].id_item,
        idPokemon : team.value[pickTeam.value].idTable
    })
    .then(function (response) {
        if (response.data == true) {
            bag.value[pick.value].count--;
        }
    })
    
}

function used(place,team,pokemon){

    if (pick.value == place){
        return "bg-violet-300";
    }
    if(team.length > 0){
        let existingPokemon = team.find(poke => poke.idTable === pokemon[place].idTable);
        if(existingPokemon != null){
            return "bg-red-500";
        }
    }
    return "";
}

async function getData() {
    try {
        const response = await axios.get('/api/team');
        pokemon.value = response.data.pokemon;
        nbSlotP.value = Math.ceil(pokemon.value.length / 4) * 4;
        bag.value = response.data.bag;
        nbSlotB.value = Math.ceil(bag.value.length / 4) * 4;
        team.value = response.data.team;

    } catch (error) {
        console.error(error);
    }
};

onMounted(() => {
    getData();
});

</script>

<template>
    <MainModal :open="open" :name="'Team'">
        <section class="m-1 mx-3 border p-3 rounded-lg  w-1/3 h-full">
            <h3 class="text-center text-3xl mb-2">Your team</h3>
            <ul class="grid grid-cols-3 gap-4 wrap " >
                <template v-for="n in 6">
                    <li @click="pickTeam = n-1"  class="h-26 w-26 justify-evenly hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "
                        :class="{'bg-violet-300': pickTeam==n-1}" >
                        <img v-if="n<=team.length && team[n-1].image != ''" :src="`${team[n-1].image}`" alt="item" class="w-full justify-center">
                    </li>
                </template>
            </ul>
        </section>
        <section class="border p-3 rounded-lg overflow-y-scroll w-1/3 h-full m-1 mx-3">
            {{ display }}
            <ul class="grid grid-cols-4 gap-4 wrap ">
                <template v-if="display == 'pokemon'" v-for="n in nbSlotP">
                    <li v-if="n<=pokemon.length" @click="pick = n-1" class="h-26 w-26 justify-evenly hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "
                    :class="used(n-1,team,pokemon)">
                        <img :src="`${pokemon[n-1].image}`" alt="item" class="w-full justify-center">
                    </li>
                    <li v-else class="h-26 w-26 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "></li>
                </template>
                <template v-if="display == 'item'" v-for="n in nbSlotB">
                    <li @click="pick = n-1" class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 " :class="{'bg-violet-300': pick==n-1}">
                        <img v-if="n<=bag.length && bag[n-1].count > 0" :src="`img/items/item${bag[n-1].id_item}.png`" alt="item" class="w-full justify-center">
                    </li>
                </template>
            </ul>
        </section>
        <nav class="flex flex-col justify-evenly content-evenly">
            <NormalButton class="w-full h-1/4" @click="display = 'pokemon', pick = 0">Pokemon</NormalButton>
            <NormalButton class="w-full h-1/4 my-4" @click="display = 'item', pick = 0">Item</NormalButton>
            <NormalButton class="w-full h-1/4 p-2" v-if="display == 'pokemon'" @click="addTeam()">Add in team</NormalButton>
            <NormalButton class="w-full h-1/4" v-if="display == 'item'" @click="useItem()">Use</NormalButton>
        </nav>
    </MainModal>
</template>