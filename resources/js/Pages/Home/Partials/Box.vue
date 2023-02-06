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
        <nav>
            <NormalButton>grid</NormalButton>
            <NormalButton>filter</NormalButton>
            <NormalButton @click="chooseFavorite(listPokemon[pick])" >fav</NormalButton>
            <NormalButton>sell</NormalButton>
        </nav>
        <section class="border p-8 rounded-lg overflow-y-scroll">
            <ul class="grid grid-cols-4 gap-4 wrap ">
                <template v-for="n in nbSlot">
                    <li class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "
                        @click="pick= n-1">
                        <img v-if="n<=listPokemon.length" :src="`${listPokemon[n-1].image}`" alt="item" class="w-full justify-center">
                    </li>
                </template>
            </ul>
        </section>
        <section class="rounded-lg bg-white text-red-500 w-2/6 p-8 h-full">
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