<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import NormalButton from '@/Components/Buttons/NormalButton.vue';
import LinkButton from '@/Components/Buttons/LinkButton.vue';
import MainModal from '@/Components/Modals/MainModal.vue';


const props = defineProps({
    open: {
        type: Function,
        required: true
    },
});

</script>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            listitem: [],
            nbSlot: 0,
            type: 'all'
        };
    },
    methods: {
        async getData() {
            try {
                const response = await axios.get('/api/bag', {
                    params: {
                        type: this.type
                    }
                });
                this.listitem = response.data;
                this.nbSlot = Math.ceil(this.listitem.length / 4) * 4;

            } catch (error) {
                console.error(error);
            }
        },
        newType(type) {
            this.type = type;
            this.getData();
        }
    },
    mounted() {
        this.getData();
    }

};
</script>

<template class="justify-evenly">
    <MainModal :open="open" :name="'Bag'">
        <nav class="flex flex-col w-1/3">
            <NormalButton class="w-3/4 h-1/4 m-2" @click="newType('all')">All</NormalButton>
            <NormalButton class="w-3/4 h-1/4 m-2" @click="newType('heal')">Heal</NormalButton>
            <NormalButton class="w-3/4 h-1/4 m-2" @click="newType('catch')">Catch</NormalButton>
        </nav>
        <section class="flex border h-3/4 w-1/2 p-8 mt-5 rounded-lg overflow-y-scroll">
            <ul class="grid grid-cols-4 gap-4 wrap ">
                <template v-for="n in nbSlot">
                    <li v-if="n<=listitem.length" class="h-32 w-32 hover:bg-violet-300 bg-white border border-gray-300 rounded-lg shadow  active:bg-violet-800 focus:outline-none focus:ring focus:ring-violet-500 relative"
                        @click="pick= n-1">
                        <img :src="`../img/items/item${listitem[n-1].id_item}.png`" alt="item" class="absolute">
                        <em class="absolute bg-red-300 w-8 h-8 rounded-full flex items-center justify-center">{{ listitem[n-1].count }}</em>
                    </li>
                    <li v-else class="h-32 w-32"></li>
                </template>
            </ul>
        </section>
    </MainModal>
</template>