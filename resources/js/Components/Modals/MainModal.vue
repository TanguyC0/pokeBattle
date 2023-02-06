<script setup>

    const props = defineProps(['open','name']);

</script>

<template>
    <section class="flex flex-col items-center h-5/6 w-11/12 mx-[4.1666665%] bg-red-600 bg-opacity-40 rounded-2xl border-4 absolute">
        <header class="flex w-full items-center px-2">
            <h2 class="text-3xl grow text-center">{{name}}</h2>
            <em @click="open" class="text-black text-4xl font-bold grow-0 cursor-pointer">x</em>
        </header>
        <div class="flex justify-evenly w-full h-4/5 mt-14">
            <slot/>
        </div>
    </section>
</template>