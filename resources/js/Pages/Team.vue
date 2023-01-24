<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

// defineProps({
//     namePokemon: String,
// });

let x = 7;
</script>

<template>
    <Head title="team" />
    
    <Link :href="route('home')" class="m-5 w-20 h-40 hover:underline">Home</Link>

    <main class="m-10 p-5 bg-slate-300 flex flex-col place-items-center rounded">
        <h2 class="text-3xl p-1 pb-5">Team</h2>
        <section class="flex justify-evenly w-full">
            <ul class="grid grid-cols-3 grid-rows-3 gap-3  wrap rounded bg-slate-300 w-96 h-96 ">
                <template v-for="n in 6">
                    <li class="m-1 p-1 w-full h-full bg-white rounded shadow">
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/1.png" alt="pokemon">
                    </li>
                </template>
            </ul>
            <ul class=" rounded bg-slate-300 w-80 h-28 ">
                <template v-for="n in x">
                    <li class="m-1 p-1 px-5 w-full h-full bg-white rounded shadow flex justify-between items-center">
                        <p>name</p>
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/1.png" alt="pokemon" class="h-28 w-28">
                        <p>use</p>
                    </li>
                </template>
            </ul>
            <ul>
                <li class=" w-20 h-10 my-5 bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 focus:ring-blue-300 shadow-lg shadow-blue-500/50 dark:shadow-lg font-medium text-white hover:bg-gradient-to-br  text-center rounded-lg">Pokemon</li>
                <li class=" w-20 h-10 my-5 bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 focus:ring-blue-300 shadow-lg shadow-blue-500/50 dark:shadow-lg font-medium text-white hover:bg-gradient-to-br  text-center rounded-lg">Item</li>
            </ul>
        </section>
    </main>
</template>
