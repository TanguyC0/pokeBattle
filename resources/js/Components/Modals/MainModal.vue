<script setup>

    const props = defineProps(['open','name']);

</script>

<template>
    <section class="flex flex-col items-center h-5/6 w-11/12 mx-[4.1666665%] bg-red-600 bg-opacity-70 rounded-2xl border-4 absolute">
        <header class="flex w-full items-center self-center px-2 mt-1">
            <h2 class="flex text-3xl grow font-bold text-white text-center">{{name}}</h2>
            <em @click="open" class="flex text-white text-4xl font-bold grow-0 cursor-pointer">x</em>
        </header>
        <div class="flex w-full h-4/5 mt-3 items-center justify-evenly">
            <slot/>
        </div>
    </section>
</template>