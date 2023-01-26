<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href']);
</script>

<template>
    <Link :href="href" class="w-52 h-52 text-white bg-gradient-to-r
        from-blue-200 via-blue-300 to-blue-400 hover:bg-gradient-to-br focus:ring-4 
        focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 rounded-lg 
        text-sm px-5 py-2.5 text-center border-2">
        <slot/>
    </Link>
</template>