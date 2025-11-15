<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
const props = defineProps({
    login: String
});
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout :login="props.login">
    </AuthenticatedLayout>
</template>
