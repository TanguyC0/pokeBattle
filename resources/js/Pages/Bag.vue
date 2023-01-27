<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import ButtonMenu from '@/Components/ButtonMenu.vue';

const props = defineProps({
    listitem: Array,
});
console.log(props.listitem);
// let nbSlot = props.listitem.length + (4 - (props.listitem.length%4));
let nbSlot = 16;


</script>

<template>
    <Head title="bag" />

    <!-- <Link :href="route('home')" class="m-5 w-20 h-40 hover:underline">Home</Link> -->
    
    <!-- <main class="m-10 p-5 bg-slate-300 flex flex-col place-items-center rounded">
        <h2 class="text-3xl p-1 pb-5">Bag</h2>
        <div class="flex place-items-center">
            <section class="mx-5 flex flex-col place-items-center">
                <Link :href="route('bag')" class=" w-20 h-10 bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 focus:ring-blue-300 shadow-lg shadow-blue-500/50 dark:shadow-lg font-medium text-white hover:bg-gradient-to-br  text-center rounded-lg">all</Link>
                <Link :href="route('bag','heal')" class="my-5 w-20 h-10 bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 focus:ring-blue-300 shadow-lg shadow-blue-500/50 dark:shadow-lg font-medium text-white hover:bg-gradient-to-br  text-center rounded-lg">heal</Link>
                <Link :href="route('bag','catch')" class="w-20 h-10 bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 focus:ring-blue-300 shadow-lg shadow-blue-500/50 dark:shadow-lg font-medium text-white hover:bg-gradient-to-br  text-center rounded-lg">catch</Link>
            </section>
            <ul class="grid grid-cols-4 grid-rows-4 gap-2  wrap rounded bg-slate-300 w-60 h-60 ">
                <template v-for="n in nbSlot">
                    <li class="m-1 p-1 w-full h-full bg-white rounded shadow">
                        <img v-if="n<=listitem.length" :src="`../img/item${listitem[n-1].id_item}.png`" alt="item">
                        <em v-if="n<=listitem.length">count : {{ listitem[n-1].count }}</em>
                    </li>
                </template>
            </ul>
        </div>
    </main> -->


    <div class ="w-full max-h-screen min-h-screen h-screen">
        <Link :href="route('home')" class="m-5 w-20 h-40 hover:underline">Home</Link>
        <!-- <Header :dataUser="dataUser"/> -->
        <main class="flex flex-col items-center h-4/5 mx-10 bg-red-600 bg-opacity-30 rounded-2xl border-4">
            <h2 class="text-3xl flex">Bag</h2>
            <div class="flex justify-evenly w-full h-4/5 mt-14">
                <nav>
                    <!-- <button class="mr-2 w-20 h-10 bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 focus:ring-blue-300 shadow-lg shadow-blue-500/50  font-medium hover:bg-gradient-to-br  text-center  rounded-lg" @click="toggleGrid">Grid</button>
                    <button class="ml-2 w-20 h-10 bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 focus:ring-blue-300 shadow-lg shadow-blue-500/50  font-medium hover:bg-gradient-to-br text-center border rounded-lg">Filter</button> -->
                    <ButtonMenu :href="route('bag')">all</ButtonMenu>
                    <ButtonMenu :href="route('bag','heal')">heal</ButtonMenu>
                    <ButtonMenu :href="route('bag','catch')">catch</ButtonMenu>
                </nav>
                <section class="border p-8 rounded-lg overflow-y-scroll">
                    <ul class="grid grid-cols-4 gap-4 wrap ">
                        <template v-for="n in nbSlot">
                            <li class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 relative"
                                @click="pick= n-1" @mouseover="" >
                                <img v-if="n<=listitem.length" :src="`../img/item${listitem[n-1].id_item}.png`" alt="item" class="absolute">
                                <em v-if="n<=listitem.length" class="absolute bg-red-300 w-8 h-8 rounded-full flex items-center justify-center">{{ listitem[n-1].count }}</em>
                            </li>
                        </template>
                    </ul>
                </section>
            </div>
        </main>
    </div>

</template>
