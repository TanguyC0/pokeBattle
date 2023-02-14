<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
    import NormalButton from './NormalButton.vue';

    const props = defineProps(['href','color']);
</script>

<template>
    <NormalButton :color="color">
        <Link :href="href" class="w-full h-full flex items-center bg-gradient justify-center" >
            <slot/>
        </Link>
    </NormalButton>
</template>