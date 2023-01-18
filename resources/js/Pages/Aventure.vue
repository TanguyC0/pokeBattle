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
        <Link :href="route('aventure')">Advnture</Link>
        <Link :href="route('bag')">Bag</Link>
        <Link :href="route('team')">Team</Link>
        <Link :href="route('box')">Box</Link>
    </nav>
    <p>aventure</p>
</template>
