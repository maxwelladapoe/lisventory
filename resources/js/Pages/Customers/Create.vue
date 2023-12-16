<template>
    <Head title="Create Customer" />
    <AuthenticatedLayout hide-header>
        <v-card title="Create customers">
            <v-card-text>
                <AddCustomerForm />
            </v-card-text>
        </v-card>
    </AuthenticatedLayout>
</template>

<script setup>
import AddCustomerForm from "@/Components/Forms/AddCustomerForm.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>
