<script setup>
import { ref } from 'vue';
import NormalButton from '@/Components/Buttons/NormalButton.vue';
import MainModal from '@/Components/Modals/MainModal.vue';
import axios from 'axios';

const props = defineProps(['open']);

const pick = ref(0);
const pickTeam = ref(0);
const display = ref('pokemon');

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

</script>
<script>
// import axios from 'axios';

export default {
    data() {
        return {
            pokemon: [],
            bag: [],
            team: [],
            nbSlotP: 0,
            nbSlotB: 0,
        };
    },
    methods: {
        async getData() {
            try {
                const response = await axios.get('/api/team');
                this.pokemon = response.data.pokemon;
                this.nbSlotP = Math.ceil(this.pokemon.length / 4) * 4;
                this.bag = response.data.bag;
                this.nbSlotB = Math.ceil(this.bag.length / 4) * 4;
                this.team = response.data.team;

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
    <MainModal :open="open" :name="'Team'">
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
                <template v-if="display == 'pokemon'" v-for="n in nbSlotP">
                    <li v-if="n<=pokemon.length" @click="pick = n-1" class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "
                    :class="used(n-1,team,pokemon)">
                        <img :src="`${pokemon[n-1].image}`" alt="item" class="w-full justify-center">
                    </li>
                    <li v-else class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "></li>
                </template>
                <template v-if="display == 'item'" v-for="n in nbSlotB">
                    <li @click="pick = n-1" class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 " :class="{'bg-violet-300': pick==n-1}">
                    <!-- :class="used(listPokemon[n-1].idTable,team,n-1)" -->
                        <img v-if="n<=bag.length" :src="`img/items/item${bag[n-1].id_item}.png`" alt="item" class="w-full justify-center">
                    </li>
                </template>
            </ul>
        </section>
        <nav>
            <NormalButton @click="display = 'pokemon', pick = 0">pokemon</NormalButton>
            <NormalButton @click="display = 'item', pick = 0">item</NormalButton>
            <NormalButton v-if="display == 'pokemon'" @click="switchPokemon(pickTeam,pokemon[pick].idTable,team)">take in team</NormalButton>
            <NormalButton v-if="display == 'item'">use</NormalButton>
        </nav>
    </MainModal>
</template>