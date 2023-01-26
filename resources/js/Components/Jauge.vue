<script setup>

const props = defineProps(['dataUser', 'color']);

</script>

<template>
    <div :class="`border-2 border-${color}-500 w-1/4 h-12 relative border bg-gray-200 rounded`">
        <div class="absolute w-full text-center p-3 h-12 z-10 font-xl text-black">
            <slot/>
        </div>
        <div :class="`absolute h-11 bg-gradient-to-r from-${color}-200 via-${color}-300 to-${color}-400   
            rounded-l p-0.5`" :style="`width: ${dataUser}%`">
        </div>
    </div>
</template>