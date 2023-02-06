<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href']);
</script>

<template>
    <Link :href="href" class="w-40 h-32 text-white bg-gradient-to-r
        from-blue-200 via-blue-300 to-blue-400 hover:bg-gradient-to-br focus:ring-4 
        focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 rounded-lg 
        text-4xl border-2 flex items-center justify-center">
        <slot/>
    </Link>
</template>