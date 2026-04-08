<script setup>
import { ref } from 'vue';
import AutocompleteField from './AutocompleteField.vue';

const open = ref(false)
</script>
<template>
    <div class="absolute right-2 bottom-2 w-10 h-10 rounded-full flex flex-row justify-center align-middle items-center bg-white shadow"
        @click="() => open = !open">
        <h2>+</h2>
    </div>
    <div v-if="open" class="absolute right-0 top-0 h-screen w-screen flex flex-col items-center justify-center bg-[#00000030]" @click="() => open = !open">
        <div class="fixed bg-white shadow w-2/5 h-2/5 rounded">
            <AutocompleteField />
        </div>
    </div>
</template>