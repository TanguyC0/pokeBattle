<script setup>

    const props = defineProps(['color']);

    function buttonColor(str, color = 'blue'){
        return str.replaceAll( '@', color)
    }
</script>

<template>
    <div class="flex items-center justify-center w-1/3 h-12 text-white bg-gradient-to-r hover:bg-gradient-to-br shadow-lg rounded-lg text-4xl border-2 cursor-pointer"
        :class='buttonColor("from-@-200 via-@-300 to-@-400 shadow-@-500/50",color)'>
        <slot/>
    </div>
</template>