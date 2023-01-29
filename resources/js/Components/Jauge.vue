<script setup>
import { defineProps, ref } from 'vue';
const props = defineProps(['dataUser', 'color']);

console.log(props.color);

const getColor = (color, str) => {

return str.replaceAll('x', color);
}

// const getColor = (color) => {
//     switch (color) {
//         case 'red':
//             return 'from-red-200 via-red-300 to-red-400';
//         case 'yellow':
//             return 'from-yellow-200 via-yellow-300 to-yellow-400';
//         case 'green':
//             return 'from-green-200 via-green-300 to-green-400';
//         case 'blue':
//             return 'from-blue-200 via-blue-300 to-blue-400';
//         case 'purple':
//             return 'from-purple-200 via-purple-300 to-purple-400';
//     }
// }

// const getBorder = (color) => {
//     switch (color) {
//         case 'red':
//             return 'border-red-500';
//         case 'yellow':
//             return 'border-yellow-500';
//         case 'green':
//             return 'border-green-500';
//         case 'blue':
//             return 'border-blue-500';
//         case 'purple':
//             return 'border-purple-500';
//     }
// }

</script>

<template>
    <div class="border-2 w-1/5 h-12 relative bg-gray-200 rounded" :class="getColor(color,'border-x-500')">
        <div class="absolute w-full text-center p-3 h-12 z-10 font-xl text-black">
            <slot/>
        </div>
        <div class="absolute h-11 bg-gradient-to-r rounded-l p-0.5" :class="getColor(color,'from-x-200 via-x-300 to-x-400')" :style="`width: ${dataUser}%`">
        </div>
    </div>
</template>