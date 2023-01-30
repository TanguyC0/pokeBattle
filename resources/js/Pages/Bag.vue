<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import ButtonMenu from '@/Components/ButtonMenu.vue';
import Header from '@/Layouts/Header.vue';

const props = defineProps({
    listitem: Array,
});
console.log(props.listitem);
let nbSlot = props.listitem.length + (4 - (props.listitem.length%4));


</script>

<template>
    <Head title="bag" />
    <div class ="w-full max-h-screen min-h-screen h-screen">
        <Header />
        <main class="flex flex-col items-center h-4/5 mx-10 bg-red-600 bg-opacity-30 rounded-2xl border-4">
            <h2 class="text-3xl flex">Bag</h2>
            <div class="flex justify-evenly w-full h-4/5 mt-14">
                <nav>
                    <ButtonMenu :href="route('bag')">all</ButtonMenu>
                    <ButtonMenu :href="route('bag','heal')">heal</ButtonMenu>
                    <ButtonMenu :href="route('bag','catch')">catch</ButtonMenu>
                </nav>
                <section class="border p-8 rounded-lg overflow-y-scroll">
                    <ul class="grid grid-cols-4 gap-4 wrap ">
                        <template v-for="n in nbSlot">
                            <li class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 relative"
                                @click="pick= n-1" @mouseover="" >
                                <img v-if="n<=listitem.length" :src="`../img/items/item${listitem[n-1].id_item}.png`" alt="item" class="absolute">
                                <em v-if="n<=listitem.length" class="absolute bg-red-300 w-8 h-8 rounded-full flex items-center justify-center">{{ listitem[n-1].count }}</em>
                            </li>
                        </template>
                    </ul>
                </section>
            </div>
        </main>
    </div>

</template>
