<script setup>
import { ref } from 'vue';
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

function chooseFavorite(poke){
    axios.post('/api/favorite', {
        id: poke.id
    });
}
</script>
<script>
// import axios from 'axios';

export default {
    data() {
        return {
            listPokemon: [],
            nbSlot: 0,
        };
    },
    methods: {
        async getData() {
            try {
                const response = await axios.get('/api/box');
                this.listPokemon = response.data;
                this.nbSlot = Math.ceil(this.listPokemon.length / 4) * 4;

            } catch (error) {
                console.error(error);
            }
        },
    },
    mounted() {
        this.getData();
    }

};
</script>

<template>
    <MainModal :open="open" :name="'Box'">
        <nav class="flex-col justify-evenly content-evenly m-2">
            <NormalButton class="w-3/4 h-1/4 m-2">Grid</NormalButton>
            <NormalButton class="w-3/4 h-1/4 m-2 p-2">Filter</NormalButton>
            <NormalButton class="w-3/4 h-1/4 m-2" @click="chooseFavorite(listPokemon[pick])" >Fav</NormalButton>
            <NormalButton class="w-3/4 h-1/4 m-2 p-2">Sell</NormalButton>
        </nav>
        <section class=" h-full w-2/3 border p-6 rounded-lg overflow-y-scroll my-5">
            <ul class="grid grid-cols-4 gap-4 wrap ">
                <template v-for="n in nbSlot">
                    <li class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "
                        @click="pick= n-1">
                        <img v-if="n<=listPokemon.length" :src="`${listPokemon[n-1].image}`" alt="item" class="w-full justify-center">
                    </li>
                </template>
            </ul>
        </section>
        <section class="rounded-lg bg-white text-red-500 w-2/6 p-8 h-full m-5">
            <h3 class="text-center">Detail</h3>
            <template v-if="listPokemon.length > 0">
                <p class=" items-center text-xl hover:underline">Type: {{listPokemon[pick].type }}</p>
                <p class=" items-center text-xl hover:underline">Level: {{listPokemon[pick].level }}</p>
                <p class=" items-center text-xl hover:underline">Exp.: {{listPokemon[pick].xp}}</p>
                <p class=" items-center text-xl hover:underline">Hp: {{listPokemon[pick].hp}}</p>
                <p class=" items-center text-xl hover:underline">Attack: {{listPokemon[pick].attack}}</p>
                <p class=" items-center text-xl hover:underline">Defense: {{listPokemon[pick].defense}}</p>
            </template>
        </section>
    </MainModal>
</template>