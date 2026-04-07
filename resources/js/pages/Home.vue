<script setup>
import { login, logout } from '@/routes/auth';
import { Link } from '@inertiajs/vue3';

defineProps({ auth: Object })
</script>

<template>
    <h2>Welcome!</h2>
    <p v-if="auth">Benvenuto {{ auth.user.name }}. Per uscire vai a <Link :href="logout()">logout</Link></p>
    <p v-else>Non collegato, per collegarti vai a <a :href="login().url">login</a></p>
</template>