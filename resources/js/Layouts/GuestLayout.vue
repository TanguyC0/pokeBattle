<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Glass from '@/Components/Modals/Glass.vue';
</script>

<template>
    <div class="min-h-screen flex flex-col justify-center sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <Link href="/main">
                <img class="w-20 h-20 fill-current" src="\img\items\item1.png" />
            </Link>
        </div>

        <Glass
        >           <slot />
        </Glass>
    </div>
</template>
