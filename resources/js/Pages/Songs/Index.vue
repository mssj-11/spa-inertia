<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Swal from 'sweetalert2';
import { Head, useForm } from '@inertiajs/vue3';

//  Form and define props
const form = useForm({});
const props = defineProps({
    songs:{type:Object}
});
</script>

<template>
    <Head title="Songs"></Head>
    <AuthenticatedLayout>
        <template #header></template>
    </AuthenticatedLayout>
</template>