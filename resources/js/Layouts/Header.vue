<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { onMounted, ref } from 'vue';
import Jauge from '@/Components/Jauge.vue';
import axios from 'axios';

const dataUser = ref([]);

async function getData() {
    try {
        await axios.get('/api/user')
        .then(function (response) {
            dataUser.value = response.data;
        });

    } catch (error) {
        console.error(error);
    }
}

onMounted(() => {
    setInterval(() => {
            getData();
        }, 5000);
});
</script>

<template>
    <header class="flex flex-row w-full h-1/5 opacity-90 p-3">
        <Link :href="route('home')" class="m-5 w-20 h-40 hover:underline">Home</Link>
        <div class="flex flex-row w-full items-center justify-evenly ">
            <Jauge :dataUser="dataUser.xp" :color="'blue'">Level:{{ dataUser.level}}</Jauge>
            <Jauge :dataUser="100" :color="'yellow'">Money: {{ dataUser.money}} $</Jauge>
            <Jauge :dataUser="100" :color="'red'">Energy: 100/100</Jauge>
            <Jauge :dataUser="(dataUser.box/dataUser.max_box)*100" :color="'purple'">Box: {{dataUser.box}}/{{ dataUser.max_box }}</Jauge>
        </div> 


        <div class="flex flex-row justify-start items-center ">
            <Link :href="route('dashboard')" type="button" class="flex w-14 h-14 bg-gray-800 
                rounded-full focus:ring-4 focus:ring-gray-300"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <img class="w-14 h-14 rounded-full" :src="`/img/profil/${dataUser.pdp}.png`" alt="user photo">
            </Link>
        </div>

    </header>
</template>