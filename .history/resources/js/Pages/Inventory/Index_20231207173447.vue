<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <div class="mb-5">
            <h5 class="text-h5 font-weight-bold">Inventory</h5>
            <Breadcrumbs :items="breadcrumbs" class="pa-0 mt-1" />
        </div>
     


        <div>
            {{  }}
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import { Head } from "@inertiajs/vue3";

const breadcrumbs = [
    {
        title: "Inventory",
        disabled: true,
    },
];
</script>
