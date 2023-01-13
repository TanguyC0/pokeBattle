<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

// defineProps({
//     item: Array,
// });

// longeur de item
let item = [1,2,2,2,1,1,1,2,2,1,2];
let nbSlot = item.length + (4 - (item.length%4));

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
        <li v-for="n in nbSlot" :key="item" class="m-1 bg-red-100 w-60 h-60">
            <img v-if="n<=item.length" :src="`img/item${item[n-1]}.png`" alt="item">
        </li>
    </ul>
    
</template>
