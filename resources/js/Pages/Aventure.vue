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

<template>
    <Head title="aventure" />

    <Link :href="route('home')" class="m-5 w-20 h-40 hover:underline">Home</Link>
    
    <main class="m-10 p-10 bg-slate-300 flex flex-col border rounded-lg">
        <h2 class="text-3xl p-3">aventure</h2>
        <section class="flex">
            <div class="flex flex-col">
                <Link :href="route('aventure.walk','1')" class="w-32 h-32 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-2 my-2">walk</Link>
                <select v-if="status == 2" name="item" id="item" @change="use = $event.target.value" class="w-32 h-10 bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-2 my-2">
                    <option v-for="pokeball in items" :key="pokeball.id" :value="pokeball.id">{{ pokeball.name }} ({{ pokeball.count }})</option>
                </select>
                <Link v-if="status == 2" :href="route('aventure.catch',[`${id}`,`${use}`])" class="w-32 h-32 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-2 my-2">catch</Link>

            </div>
            <div class="m-1 h-80 w-80  bg-white border border-gray-300 rounded-lg shadow hover:bg-gray-200 text-center">
                <img v-if="status != 0" :src="`${ img }`" alt="">
                <p>{{ message }}</p>
            </div>
        </section>
    </main>

</template>

