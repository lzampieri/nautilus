<script setup>
import { register } from '@/routes/user';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({ predata: Object })

console.log(props.predata)

const form = useForm({
    name: props.predata?.name,
    email: props.predata?.email
})

const submit = () => {
    form.post(register());
}

</script>

<template>
    <form @submit.prevent="submit">
        <input type="text" maxlength="255" v-model="form.name"/>
        <input type="email" maxlength="255" v-model="form.email" />
        <button type="submit">Registrati</button>  
    </form>
</template>