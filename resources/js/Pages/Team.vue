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
    <p>team</p>
</template>
