<script setup>
import { Head, Link} from '@inertiajs/inertia-vue3';
import { defineProps, ref } from 'vue';
import ButtonMenu from '@/Components/ButtonMenu.vue';

const props = defineProps({
    // dataUser: Array,
    status : Number,
    message: String,
    img: String,
    id: Number,
    items: Array,
    location: Object,
});

const use = props.status == 2 ? ref(props.items[0].id) : 0;
const stage = ref(1);

let active = ref([true, false, false, false, false, false]);

console.log(props.location);

const inStage = (zone, str, stage) => {
    return str.replace('@',JSON.parse(zone.position).x).replace('@',JSON.parse(zone.position).y);
}

const switchZone = (id) => {
    active = [false, false, false, false, false, false];
    active[id-1] = true;
}

</script>

<template>
    <Head title="aventure" />

    <div class ="w-full max-h-screen min-h-screen h-screen">
        <Link :href="route('home')" class="m-5 w-20 h-40 hover:underline">Home</Link>
        <main class="flex flex-row justify-around h-4/5 w-full ">

            <section class="bg-red-600 bg-opacity-30 rounded-2xl border-4 p-5">
                <h2 class="text-center text-5xl mb-10">TEAM</h2>
                <ul class="grid grid-cols-2 gap-4 wrap ">
                    <li v-for="n in 6" class="h-40 w-40 bg-white"></li>
                </ul>
            </section>

            

            <section class="bg-red-600 bg-opacity-30 rounded-2xl border-4 w-2/5 p-5 flex flex-col">
                <!-- carte -->
                <div class="bg-[url('/img/map/map.jpg')] bg-no-repeat bg-contain h-3/5">
                    <div v-for="zone in location" class="w-5 h-5 rounded-full border-2 relative bg-yellow-500" :class="inStage(zone, 'top-[@px] left-[@px]', stage), {'bg-pink-500' : active[zone.id-1]} " @click="stage = zone.id, switchZone(zone.id)"></div>
                </div>

                <section class="flex justify-center m-2">
                    <div class="w-80">
                        <p class="bg-white p-2">{{ message }}</p>
                        <!-- bouton -->
                        <div class="flex flex-row ">
                            <Link :href="route('aventure.walk',`${stage}`)" class="w-36 h-20 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-3 my-2">walk</Link>
                            <Link v-if="status == 2" :href="route('aventure.catch',[`${id}`,`${use}`])" class="w-36 h-20 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-3 my-2">catch</Link>
                        </div>
                            <select v-if="status == 2" name="item" id="item" @change="use = $event.target.value" class="w-80 h-10 bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-2 my-2">
                                <option v-for="pokeball in items" :key="pokeball.id" :value="pokeball.id">{{ pokeball.name }} ({{ pokeball.count }})</option>
                            </select>
                    </div>

                    <!-- vue -->
                    <div class="flex flex-col">
                        <div class="m-1 h-64 w-64  bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-200 text-center">
                            <img :src="`${ img }`" alt="">
                        </div>
                        
                    </div>
                </section>
            </section>
        </main>
    </div>

</template>

