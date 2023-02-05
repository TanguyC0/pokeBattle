<script setup>
import { ref } from 'vue';
import NormalButton from '@/Components/Buttons/NormalButton.vue';
import LinkButton from '@/Components/Buttons/LinkButton.vue';
import MainModal from '@/Components/Modals/MainModal.vue';

const props = defineProps(['open']);

const listitem = ref([]);
let nbSlot = listitem.value.length + (4 - (listitem.value.length%4));
// let nbSlot = 16;

</script>

<template>
    <MainModal :open="open" :name="'Bag'">
        <nav>
            <LinkButton :href="route('bag')">all</LinkButton>
            <LinkButton :href="route('bag','heal')">heal</LinkButton>
            <LinkButton :href="route('bag','catch')">catch</LinkButton>
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
    </MainModal>
</template>