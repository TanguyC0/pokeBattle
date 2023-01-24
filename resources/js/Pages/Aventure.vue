<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    // dataUser: Array,
    status : Number,
    message: String,
    img: String,
    id: Number,
    items: Array,
});

</script>
<script>
export default {
    data() {
        return {
            use: 1   
        }
    },
};
</script>


<!-- modal template: https://flowbite.com/docs/components/modal/#javascript-behaviour  -->
<template>
<Head title="aventure" />

    <div class="flex flex-row w-full h-100vh">
        <nav class="flex flex-col font-unown items-center ml-3 w-1/4 h-100vh">
            
                    <div class="flex flex-col items-start md:order-2 h-100vh  mt-5 ">
                        <Link :href="route('home')" class=" mt-5 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Home</Link>
                        <Link :href="route('aventure.index')" class=" mt-5 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Adventure</Link>
                        <Link :href="route('bag')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Bag</Link>
                        <Link :href="route('team')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Team</Link>
                        <Link :href="route('box')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Box</Link>
                </div>
        </nav>

        <Link :href="route('aventure.walk','1')" class=" mt-5 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">walk</Link>
        <p>{{ message }}</p>
        <img v-if="status != 2" :src="`${ img }`" alt="" class="m-1 bg-red-100 w-60 h-60">

        <select v-if="status == 1" name="item" id="item" @change="use = $event.target.value">
            <option v-for="pokeball in items" :key="pokeball.id" :value="pokeball.id">{{ pokeball.name }} ({{ pokeball.count }})</option>
        </select>
        <Link v-if="status == 1" :href="route('aventure.catch',[`${id}`,`${use}`])" class=" mt-5 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">catch</Link>

    </div>

</template>
