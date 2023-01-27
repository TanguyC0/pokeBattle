<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import ButtonMenu from '@/Components/ButtonMenu.vue';

// defineProps({
//     namePokemon: String,
// });

let nbSlot = 6;

</script>

<template>
    <Head title="team" />
    
    <!-- <Link :href="route('home')" class="m-5 w-20 h-40 hover:underline">Home</Link>

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
    </main> -->

    <div class ="w-full max-h-screen min-h-screen h-screen">
        <Link :href="route('home')" class="m-5 w-20 h-40 hover:underline">Home</Link>
        <!-- <Header :dataUser="dataUser"/> -->
        <main class="flex flex-col items-center h-4/5 mx-10 bg-red-600 bg-opacity-30 rounded-2xl border-4">
            <h2 class="text-3xl flex">Team</h2>
            <div class="flex justify-evenly w-full h-4/5 mt-14">
                <section class="border p-8 rounded-lg">
                    <h3 class="text-center text-3xl mb-8">Your team</h3>
                    <ul class="grid grid-cols-3 gap-4 wrap ">
                        <template v-for="n in nbSlot">
                            <li class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "
                                @mouseover="" >
                                <!-- <img v-if="n<=listPokemon.length" :src="`${listPokemon[n-1].image}`" alt="item" class="w-full justify-center"> -->
                            </li>
                        </template>
                    </ul>
                </section>
                <section class="border p-8 rounded-lg overflow-y-scroll">
                    <ul class="grid grid-cols-4 gap-4 wrap ">
                        <template v-for="n in nbSlot">
                            <li class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 "
                                @mouseover="" >
                                <!-- <img v-if="n<=listPokemon.length" :src="`${listPokemon[n-1].image}`" alt="item" class="w-full justify-center"> -->
                            </li>
                        </template>
                    </ul>
                </section>
                <nav>
                    <!-- <button class="mr-2 w-20 h-10 bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 focus:ring-blue-300 shadow-lg shadow-blue-500/50  font-medium hover:bg-gradient-to-br  text-center  rounded-lg" @click="toggleGrid">Grid</button>
                    <button class="ml-2 w-20 h-10 bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 focus:ring-blue-300 shadow-lg shadow-blue-500/50  font-medium hover:bg-gradient-to-br text-center border rounded-lg">Filter</button> -->
                    <ButtonMenu>pokemon</ButtonMenu>
                    <ButtonMenu>item</ButtonMenu>
                </nav>
            </div>
        </main>
    </div>
</template>
