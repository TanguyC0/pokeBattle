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

    <nav>
        <Link :href="route('home')">Home</Link>
        <Link :href="route('aventure')">aventure</Link>
        <Link :href="route('bag')">bag</Link>
        <Link :href="route('team')">team</Link>
        <Link :href="route('box')">box</Link>
    </nav>
    <p>box</p>
    <ul class="grid grid-cols-4 gap-4">
        <li v-for="n in nbSlot" :key="listitem" class="m-1 bg-red-100 w-60 h-60">
            <img v-if="n<=listitem.length" :src="`img/item${listitem[n-1].id_item}.png`" alt="item">
        </li>
    </ul>

</template>
