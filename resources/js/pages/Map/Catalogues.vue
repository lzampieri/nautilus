<script setup>
import { create } from '@/routes/catalogue';
import { useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const catalogues = usePage().props.catalogues
console.log(catalogues)
const isOpen = ref(false);

const form = useForm({
    name: ""
})

const submit = () => {
    form.post(create());
}

</script>
<template>
    <div class="absolute top-0 left-0">
        <div v-for="cat in catalogues">
            {{ cat.name }}
        </div>
        <div @click="() => isOpen = true">
            Add catalogue
        </div>
    </div>
    <div v-if="isOpen" class="fixed inset-0 z-20">
        <form @submit.prevent="submit" class="flex flex-col justify-center items-center">
            <input type="text" v-model="form.name" placeholder="Nome..." />
            <button type="submit">Registra</button>
        </form>
    </div>
</template>