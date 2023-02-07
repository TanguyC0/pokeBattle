<script setup>
import { Head, Link} from '@inertiajs/inertia-vue3';
import { defineProps, ref } from 'vue';
import SmallButton from '@/Components/Buttons/SmallButton.vue';
import Header from '@/Layouts/Header.vue';
import Glass from '@/Components/Modals/Glass.vue';
import axios from 'axios';

const props = defineProps({
    // dataUser: Array,

    data: Array,

});

const message = ref(props.data);
console.log(message.value);
const use =  ref(0);
const stage = ref(1);

let active = ref([true, false, false, false, false, false]);

const inStage = (zone, str, stage) => {
    return str.replace('@',JSON.parse(zone.position).x).replace('@',JSON.parse(zone.position).y);
}

const switchZone = (id) => {
    active = [false, false, false, false, false, false];
    active[id-1] = true;
}

function walk(){
    message.value = {
        message: 'loading...',
        status: -1,
        img: '/img/load/walk.gif',
        location: message.value.location,
        team: message.value.team,
        items: [],
    }
    axios.post('/api/aventure/walk', {
        stage: stage.value,
    }).then((response) => {
        message.value = response.data;
        if(message.value.status == 2){
            use.value = message.value.items[0].id;
        }
    })
}

function catchP(){
    message.value = {
        message: 'loading...',
        status: -1,
        img: '/img/load/pokeball.gif',
        location: message.value.location,
        team: message.value.team,
        items: message.value.items,
        id: message.value.id,
    }
    axios.post('/api/aventure/catch', {
        id: message.value.id,
        idItem: use.value,
    }).then((response) => {
        message.value = response.data;
    })
}

</script>

<template>
    <Head title="aventure" />

    <div class ="w-full max-h-screen min-h-screen h-screen">
        <Header />
        <main class="flex flex-row justify-around h-4/5 w-full ">

            <Glass>
                <h2 class="text-center text-5xl mb-10">TEAM</h2>
                <ul class="grid grid-cols-3 gap-4 wrap">
                    <template v-for="n in 6">
                        <li class="bg-white w-40 h-40">
                            <img v-if="n<=message.team.length" :src="`${message.team[n-1].image}`" alt="">
                        </li>
                    </template>
                </ul>
            </Glass>

            <Glass>
                <!-- carte -->
                <div class="bg-[url('/img/map/map.jpg')] rounded bg-no-repeat bg-contain h-3/5">
                    <div v-for="zone in message.location" class="w-5 h-5 rounded-full border-2 relative z-10 bg-yellow-500" :class="inStage(zone, 'top-[@px] left-[@px]', stage), {'bg-pink-500' : active[zone.id-1]} " @click="stage = zone.id, switchZone(zone.id)"></div>
                </div>

                <section class="flex justify-between mt-5">
                    <div class="w-3/5 flex flex-col justify-evenly">
                        <p class="bg-white p-2 rounded">{{ message.message }}</p>

                        <div class="flex flex-row justify-around ">
                            <SmallButton v-if="message.status != -1" color="red" @click="walk">Walk</SmallButton>
                            <SmallButton v-if="message.status == 2" color="green" @click="catchP">Catch</SmallButton>
                            <SmallButton v-if="message.status == 4" color="blue" >Fight</SmallButton>
                            <!-- <Link :href="route('aventure.walk',`${stage}`)" class="flex w-25 h-12 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-3 my-2">Walk</Link> -->
                            <!-- <Link v-if="status == 2" :href="route('aventure.catch',[`${id}`,`${use}`])" class=" flex w-25 h-12 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-3 my-2">Catch</Link> -->
                        </div>
                        <select v-if="message.status == 2" name="item" id="item" @change="use = $event.target.value" class="flex w-50 h-10 bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-2 my-2">
                            <option v-for="pokeball in message.items" :key="pokeball.id" :value="pokeball.id">{{ pokeball.name }} ({{ pokeball.id }})</option>
                        </select>
                        
                    </div>

                    <div class="flex w-2/6">
                        <div class=" bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-200 text-center">
                            <img :src="`${ message.img }`" alt="" class="flex">
                        </div>
                        
                    </div>
                </section>
            </Glass>
            

            
        </main>
    </div>

</template>

