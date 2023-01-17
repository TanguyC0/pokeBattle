<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    listPokemon: Array,
});
console.log(props.listPokemon);
// // longeur de item
// let nbSlot = listPokemon.length + (4 - (listPokemon.length%4));
let nbSlot = props.listPokemon.length + (4 - (props.listPokemon.length%4));
let pick = 0;

</script>

<template>
    <Head title="home" />

    <Link :href="route('home')" class="m-5 bg-blue-500">Home</Link>
    <main class="m-10 p-10 bg-slate-300 flex flex-col">
        <h2 class="text-3xl">Bag</h2>
        <div class="flex place-items-center">
            <section>
                <nav>
                    <a href="" class="mr-2 w-20 h-16 bg-blue-500 text-center">grid</a>
                    <a href="" class="ml-2 w-20 h-16 bg-blue-500 text-center">filtre</a>
                </nav>
                <ul class="grid grid-cols-4 gap-4">
                    <template v-for="n in nbSlot">
                        <li class="m-1 bg-red-100 w-60 h-60">
                            <img v-if="n<=listPokemon.length" :src="`https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${listPokemon[n-1].id_pokemon}.png`" alt="item">
                        </li>
                    </template>
                </ul>
            </section>
            <section class="bg-red-100 ml-5 w-1/3">
                <h3>detail</h3>
                <p>name {{ listPokemon[pick].name }}</p>
                <p>type {{ listPokemon[pick].type }}</p>
                <p>level {{ listPokemon[pick].level }}</p>
                <p>exp {{ listPokemon[pick].exp }}</p>
                <p>hp {{ listPokemon[pick].hp }}</p>
                <p>attack {{ listPokemon[pick].attack }}</p>
                <p>defense {{ listPokemon[pick].defense }}</p>
            </section>
        </div>
    </main>
</template>
