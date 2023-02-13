<script setup>
import { ref, onMounted } from 'vue';
import NormalButton from '@/Components/Buttons/NormalButton.vue';
import MainModal from '@/Components/Modals/MainModal.vue';
import axios from 'axios';

const props = defineProps({
    open: {
        type: Function,
        required: true
    },
});

const pick = ref(0);
const listPokemon = ref([]);
const nbSlot = ref(0);

function chooseFavorite(poke){
    axios.post('/api/favorite', {
        id: poke.id
    });
}

function sell(poke){
    axios.post('/api/sell', {
        id: poke.idTable
    })
    .then(function (response) {
        if(response.data)
        {
            listPokemon.value.splice(pick.value, 1);
            nbSlot.value = Math.ceil(listPokemon.value.length / 4) * 4;
            pick.value = 0;
        }
        
    })
}

async function getData() {
    try {
        const response = await axios.get('/api/box');
        listPokemon.value = response.data;
        nbSlot.value = Math.ceil(listPokemon.value.length / 4) * 4;

    } catch (error) {
        console.error(error);
    }
}

onMounted(() => {
    getData();
});

</script>

<template>
    <MainModal :open="open" :name="'Box'">
        <nav class="flex-col justify-evenly content-evenly m-2">
            <NormalButton class="w-3/4 h-1/4 m-2">Grid</NormalButton>
            <NormalButton class="w-3/4 h-1/4 m-2 p-2">Filter</NormalButton>
            <NormalButton class="w-3/4 h-1/4 m-2" @click="chooseFavorite(listPokemon[pick])" >Fav</NormalButton>
            <NormalButton class="w-3/4 h-1/4 m-2 p-2" @click="sell(listPokemon[pick])">Sell</NormalButton>
        </nav>
        <section class=" h-full w-1/3 border p-6 rounded-lg overflow-y-scroll my-5 ml-2">
            <ul class="grid grid-cols-4 gap-4 wrap ">
                <template v-for="n in nbSlot">
                    <li class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "
                        @click="pick= n-1">
                        <img v-if="n<=listPokemon.length" :src="`${listPokemon[n-1].image}`" alt="item" class="w-full justify-center">
                    </li>
                </template>
            </ul>
        </section>
        <section class="grid rounded-lg bg-white text-black w-1/3 p-4 h-full m-5 justify-evenly ">
            <h3 class="text-center font-bold text-4xl">Detail</h3>
            <template v-if="listPokemon.length > 0">
                <p class=" items-center text-xl  hover:underline">Type: {{listPokemon[pick].type }}</p>
                <p class=" items-center text-xl hover:underline">Level: {{listPokemon[pick].level }}</p>
                <p class=" items-center text-xl hover:underline">Exp.: {{listPokemon[pick].xp}}</p>
                <p class=" items-center text-xl hover:underline">Hp: {{listPokemon[pick].hp}}</p>
                <p class=" items-center text-xl hover:underline">Attack: {{listPokemon[pick].attack}}</p>
                <p class=" items-center text-xl hover:underline">Defense: {{listPokemon[pick].defense}}</p>
            </template>
        </section>
    </MainModal>

</template>

<style> *{ font-family:"pokemonXY";} </style>