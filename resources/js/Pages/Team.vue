<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

// defineProps({
//     namePokemon: String,
// });
</script>

<template>
    <Head title="team" />

    <nav>
        <Link :href="route('home')">Home</Link>
    </nav>

    <div class="grid w-1/2 h-full justify-center object-contain">
            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/1.png" alt="pokemon" class="align-center justify-center object-scale-down p-1 ring-2 ring-yellow-300 dark:ring-gray-500 ">
            <p>{{ namePokemon }}</p></div>
            <div class="flex w-1/2 h-full justify-center object-contain">
            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/1.png" alt="pokemon" class="align-center justify-center object-scale-down p-1 ring-2 ring-yellow-300 dark:ring-gray-500 ">
            <p>{{ namePokemon }}</p></div>
            <div class="flex w-1/2 h-full justify-center object-contain">
            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/1.png" alt="pokemon" class="align-center justify-center object-scale-down p-1 ring-2 ring-yellow-300 dark:ring-gray-500 ">
            <p>{{ namePokemon }}</p></div>
            <div class="flex w-1/2 h-full justify-center object-contain">
            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/1.png" alt="pokemon" class="align-center justify-center object-scale-down p-1 ring-2 ring-yellow-300 dark:ring-gray-500 ">
            <p>{{ namePokemon }}</p></div>
            <div class="flex w-1/2 h-full justify-center object-contain">
            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/1.png" alt="pokemon" class="align-center justify-center object-scale-down p-1 ring-2 ring-yellow-300 dark:ring-gray-500 ">
            <p>{{ namePokemon }}</p></div>
            <div class="flex w-1/2 h-full justify-center object-contain">
            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/1.png" alt="pokemon" class="align-center justify-center object-scale-down p-1 ring-2 ring-yellow-300 dark:ring-gray-500 ">
            <p>{{ namePokemon }}</p></div>
        </div>
    <p>team</p>
</template>
