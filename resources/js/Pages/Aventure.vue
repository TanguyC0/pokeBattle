<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

// defineProps({
//     namePokemon: String,
// });
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
    <p>aventure</p>
</template>
