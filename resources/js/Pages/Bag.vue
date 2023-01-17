<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    listitem: Array,
});
console.log(props.listPokemon);
// // longeur de item
// let nbSlot = listPokemon.length + (4 - (listPokemon.length%4));
let nbSlot = props.listitem.length + (4 - (props.listitem.length%4));

</script>

<template>
    <Head title="home" />

    <Link :href="route('home')" class="m-5 bg-blue-500">Home</Link>
    
    <main class="m-10 p-10 bg-slate-300 flex flex-col place-items-center">
        <h2 class="text-3xl">Bag</h2>
        <div class="flex place-items-center">
            <section class="mx-5 flex flex-col place-items-center">
                <Link :href="route('bag')" class=" w-20 h-16 bg-blue-500 text-center">all</Link>
                <Link :href="route('bag','heal')" class="my-5 w-20 h-16 bg-blue-500 text-center">heal</Link>
                <Link :href="route('bag','catch')" class="w-20 h-16 bg-blue-500 text-center">catch</Link>
            </section>
            <ul class="grid grid-cols-4 gap-4">
                <template v-for="n in nbSlot">
                    <li class="m-1 p-5 bg-red-100 w-60 h-60">
                        <img v-if="n<=listitem.length" :src="`../img/item${listitem[n-1].id_item}.png`" alt="item">
                    </li>
                </template>
            </ul>
        </div>
    </main>

</template>
